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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid')
                ->nullable();
            $table->string('ip_address')
                ->nullable();
            $table->string('user_agent')
                ->nullable();
            $table->string('os')
                ->nullable();
            $table->string('device')
                ->nullable();
            $table->string('platform')
                ->nullable();
            $table->string('version')
                ->nullable();
            $table->string('location')
                ->nullable();
            $table->integer('hits')
                ->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
