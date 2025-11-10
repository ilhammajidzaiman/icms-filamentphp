<?php

use App\Models\User;
use App\Models\Post\BlogCategory;
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
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid')
                ->nullable();
            $table->boolean('is_show')
                ->default(true);
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignIdFor(BlogCategory::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('slug')
                ->nullable()
                ->unique();
            $table->string('title')
                ->nullable()
                ->unique();
            $table->longText('content')
                ->nullable();
            $table->string('file')
                ->nullable();
            $table->string('description')
                ->nullable();
            $table->json('attachment')
                ->nullable();
            $table->timestamp('published_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_articles');
    }
};
