<?php

use App\Enums\RoleEnum;
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
        })->name('make.role');
    }
);
