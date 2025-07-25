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
        Schema::create('setting_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid')
                ->nullable();
            $table->string('name')
                ->nullable()
                ->comment('nama website');
            $table->string('email')
                ->nullable()
                ->comment('email');
            $table->text('address')
                ->nullable()
                ->comment('alamat');
            $table->string('phone')
                ->nullable()
                ->comment('no. telpon/hp');
            $table->text('map')
                ->nullable()
                ->comment('embed lokasi dari google map');
            $table->text('social_media')
                ->nullable()
                ->comment('alamat sosial media');
            $table->string('favicon')
                ->nullable()
                ->comment('favicon');
            $table->string('logo')
                ->nullable()
                ->comment('logo website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_sites');
    }
};
