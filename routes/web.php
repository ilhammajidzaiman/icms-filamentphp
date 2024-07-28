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

Route::prefix('/article')->controller(Public\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('article.index');
    Route::get('/{id}/show', 'show')->name('article.show');
});

Route::prefix('/category')->controller(Public\CategoryController::class)->group(function () {
    Route::get('/{id}', 'index')->name('category.index');
    Route::get('/{id}/show', 'show')->name('category.show');
});

Route::prefix('/image')->controller(Public\ImageController::class)->group(function () {
    Route::get('/', 'index')->name('image.index');
    Route::get('/{id}/show', 'show')->name('image.show');
});

Route::prefix('/file')->controller(Public\FileController::class)->group(function () {
    Route::get('/', 'index')->name('file.index');
    Route::get('/{id}/show', 'show')->name('file.show');
});
