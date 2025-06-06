<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nav_menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid');
            $table->boolean('is_show')
                ->default(true);
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('parent_id')
                ->nullable()
                ->default(-1);
            $table->integer('order')
                ->nullable()
                ->default(0)
                ->index();
            $table->morphs('modelable');
            $table->string('slug')
                ->nullable()
                ->unique();
            $table->string('title')
                ->nullable()
                ->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_menus');
    }
};
