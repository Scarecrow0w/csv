<?php

namespace App\Http\Controllers;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportController extends Controller
{
    public function array()
    {
        $handle = fopen(public_path('storage/array.csv'), 'w');

        User::chunk(2000, function ($users) use ($handle) {
            foreach ($users->toArray() as $user) {
                fputcsv($handle, $user);
            }
        });

        fclose($handle);

        return Storage::disk('public')->download('array.csv');
    }

    public function excel()
    {
        return Excel::download(new UsersExport, 'laravel_excel.csv');
    }

    public function spatie()
    {
        $rows = [];

        User::chunk(2000, function ($users) use (&$rows) {
            foreach ($users->toArray() as $user) {
                $rows[] = $user;
            }
        });

        SimpleExcelWriter::streamDownload('spatie.csv')
            ->noHeaderRow()
            ->addRows($rows);

        exit();
    }
}
