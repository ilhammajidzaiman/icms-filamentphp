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

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/artikel')->controller(Public\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('article.index');
    Route::get('/{id}', 'show')->name('article.show');
});

Route::prefix('/halaman')->controller(Public\PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/{id}', 'show')->name('page.show');
});

Route::prefix('/kategori')->controller(Public\CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::get('/{id}', 'show')->name('category.show');
});

Route::prefix('/galeri')->controller(Public\ImageController::class)->group(function () {
    Route::get('/', 'index')->name('image.index');
    Route::get('/{id}', 'show')->name('image.show');
});

Route::prefix('/dokumen')->controller(Public\FileController::class)->group(function () {
    Route::get('/', 'index')->name('file.index');
    Route::get('/{id}', 'show')->name('file.show');
});
