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

// Imports
Route::prefix('import')->group(function () {
    Route::post('/array', [ImportController::class, 'array'])->name('import.array');
    Route::post('/excel', [ImportController::class, 'excel'])->name('import.excel');
    Route::post('/spatie', [ImportController::class, 'spatie'])->name('import.spatie');
    Route::post('/fast-excel', [ImportController::class, 'fastExcel'])->name('import.fast-excel');
});


// // Imports
// Route::prefix('import')->controller(ImportController::class)->group(function () {
//     Route::post('/array', 'array')->name('import.array');
//     Route::post('/excel', 'excel')->name('import.excel');
//     Route::post('/spatie', 'spatie')->name('import.spatie');
//     Route::post('/fast-excel', 'fastExcel')->name('import.fast-excel');
// });




// Exports
Route::prefix('export')->group(function () {
    Route::get('/array', [ExportController::class, 'array'])->name('export.array');
    Route::get('/excel', [ExportController::class, 'excel'])->name('export.excel');
    Route::get('/spatie', [ExportController::class, 'spatie'])->name('export.spatie');
    Route::get('/fast-excel', [ExportController::class, 'fastExcel'])->name('export.fast-excel');
});


// // Exports
// Route::prefix('export')->controller(ExportController::class)->group(function () {
//     Route::get('/array', 'array')->name('export.array');
//     Route::get('/excel', 'excel')->name('export.excel');
//     Route::get('/spatie', 'spatie')->name('export.spatie');
//     Route::get('/fast-excel', 'fastExcel')->name('export.fast-excel');
// });





// Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

// Route::middleware('auth')->group(function () {
//     Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
//     Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// });
