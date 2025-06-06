<?php

use Illuminate\Support\Facades\Schema;
use App\Models\Feature\FeedbackCategory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('uuid');
            $table->boolean('is_show')
                ->default(true);
            $table->foreignIdFor(FeedbackCategory::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('name')
                ->nullable();
            $table->string('email')
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
        Schema::dropIfExists('feedback');
    }
};
