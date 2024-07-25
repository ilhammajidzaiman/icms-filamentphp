<?php

use App\Http\Controllers\Public;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('/file')->controller(Public\FileController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::prefix('beranda')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
});
