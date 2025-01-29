<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('setting_pages', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('type')
                ->nullable()
                ->comment('tipe elemen');
            $table->string('title')
                ->nullable()
                ->comment('judul elemen');
            $table->boolean('is_show')
                ->default(true)
                ->comment('status tampilkan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_pages');
    }
};
