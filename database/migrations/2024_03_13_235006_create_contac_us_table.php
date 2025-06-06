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
            $table->boolean('is_show')
                ->default(true);
            $table->string('name')
                ->nullable();
            $table->string('email')
                ->nullable();
            $table->string('subject')
                ->nullable();
            $table->text('message')
                ->nullable();
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
