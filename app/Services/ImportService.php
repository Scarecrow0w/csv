<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ImportService
{
    /**
     * Validate
     *
     * @param  array $user
     * @return bool|array
     */
    protected function validateUserCsv(array $user): mixed
    {
        $toValidate = [
            'user_name' => $user[0],
            'first_name' => $user[1],
            'last_name' => $user[2],
            'patronymic' => $user[3],
            'email' => $user[4],
            'password' => $user[5],
        ];

        $validator = Validator::make($toValidate, [
            'user_name' => ['required', 'unique:users', 'string', 'max:100', 'regex:/^[a-zA-Z0-9\.]+$/i'],
            'first_name' => ['required', 'regex:/^[а-яё -]+$/ui'],
            'last_name' => ['required', 'regex:/^[а-яё -]+$/ui'],
            'patronymic' => ['nullable', 'regex:/^[а-яё -]+$/ui'],
            'email' => ['required', 'unique:users', 'email:rfc'],
            'password' => ['required', 'min:8', 'max:100', 'regex:/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'], // any set of characters, at least length 8, max length 8, containing at least one lowercase letter, at least one uppercase letter, at least one number
        ]);

        return $validator->fails()
            ? false
            : $validator->validated();
    }

    public function handleData(array $users)
    {
        $values = [];

        foreach ($users as $user) {
            if (count($user) < 6) continue;

            $validated = $this->validateUserCsv($user);

            if (!$validated) continue;

            $values[] = $validated;
        }

        foreach (array_chunk($values, 500) as $value) {
            User::create($value);
        }
    }
}
