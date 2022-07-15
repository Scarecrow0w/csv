<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Services\ImportService;
use Spatie\SimpleExcel\SimpleExcelReader;

class ImportController extends Controller
{
    public function array(Request $request, ImportService $importService)
    {
        $users = array_map('str_getcsv', file($request->file));

        $importService->handleData($users);

        return back()->with('message', 'import finished');
    }

    public function excel(Request $request, ImportService $importService)
    {
        $users = (new UsersImport)->toArray($request->file);
        $users = $users[0];

        $importService->handleData($users);

        return back()->with('message', 'import finished');
    }

    public function spatie(Request $request, ImportService $importService)
    {
        $users = SimpleExcelReader::create($request->file, 'csv')
            ->noHeaderRow()
            ->getRows()
            ->toArray();

        $importService->handleData($users);

        return back()->with('message', 'import finished');
    }
}
