<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        die;
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'user_name' => $faker->unique()->userName(),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'patronymic' => $faker->middleName(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password')
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            User::insert($chunk);
        }
    }
}
