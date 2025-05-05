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
        Schema::create('contac_us', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid');
            $table->string('name')
                ->comment('nama pengirim');
            $table->string('email')
                ->comment('email pengirim');
            $table->string('subject')
                ->nullable()
                ->comment('subjek pesan');
            $table->text('message')
                ->comment('isi pesan');
            $table->boolean('is_show')
                ->default(true)
                ->comment('status tampilkan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contac_us');
    }
};
