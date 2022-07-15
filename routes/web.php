<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// // Imports
Route::prefix('import')->controller(ImportController::class)->group(function () {
    Route::post('/array', 'array')->name('import.array');
    Route::post('/excel', 'excel')->name('import.excel');
    Route::post('/spatie', 'spatie')->name('import.spatie');
});

// // Exports
Route::prefix('export')->controller(ExportController::class)->group(function () {
    Route::get('/array', 'array')->name('export.array');
    Route::get('/excel', 'excel')->name('export.excel');
    Route::get('/spatie', 'spatie')->name('export.spatie');
});

