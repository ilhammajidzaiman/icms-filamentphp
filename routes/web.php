<?php

use App\Http\Controllers\Public;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/search')->controller(Public\SearchController::class)->group(function () {
    Route::get('/', 'index')->name('search.index');
    Route::get('/{id}', 'show')->name('search.show');
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

Route::prefix('/vidio')->controller(Public\VideoController::class)->group(function () {
    Route::get('/', 'index')->name('video.index');
    Route::get('/{id}', 'show')->name('video.show');
});

Route::prefix('/tim')->controller(Public\PeopleController::class)->group(function () {
    Route::get('/', 'index')->name('people.index');
    Route::get('/{id}', 'show')->name('people.show');
});

Route::prefix('/dokumen')->controller(Public\FileController::class)->group(function () {
    Route::get('/', 'index')->name('file.index');
    Route::get('/{id}', 'show')->name('file.show');
    Route::get('/download/{id}', 'download')->name('file.download');
    Route::get('/kategori/{id}', 'category')->name('file.category');
});

Route::prefix('/kritik-saran')->controller(Public\FeedbackController::class)->group(function () {
    Route::get('/', 'index')->name('feedback.index');
    Route::post('/store', 'store')->name('feedback.store');
});

Route::prefix('/kontak')->controller(Public\ContacUsController::class)->group(function () {
    Route::get('/', 'index')->name('contacus.index');
    Route::post('/store', 'store')->name('contacus.store');
});
