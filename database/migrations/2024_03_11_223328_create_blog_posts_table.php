<?php

use App\Models\BlogTag;
use App\Models\BlogArticle;
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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BlogArticle::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table articles');
            $table->foreignIdFor(BlogTag::class)
                ->constrained()
                ->cascadeOnDelete()
                ->comment('id table tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
