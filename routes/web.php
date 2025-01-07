<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\Public;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(
    function () {
        Route::get("/make-role", function () {
            try {
                Role::firstOrCreate(['name' => RoleEnum::SuperAdmin]);
                Role::firstOrCreate(['name' => RoleEnum::Admin]);
                Role::firstOrCreate(['name' => RoleEnum::User]);
            } catch (\Exception $e) {
                Log::error('Error membuat role: ' . $e->getMessage());
            }
            return response()->json(['message' => 'Role berhasil buat!']);
        });
    }
);

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/artikel')->controller(Public\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('article.index');
    Route::get('/{id}', 'show')->name('article.show');
    Route::get('/cari/{id}', 'search')->name('article.search');
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
    Route::get('/cari/{id}', 'search')->name('file.search');
});

Route::prefix('/kritik-saran')->controller(Public\FeedbackController::class)->group(function () {
    Route::get('/', 'index')->name('feedback.index');
    Route::post('/store', 'store')->name('feedback.store');
});
