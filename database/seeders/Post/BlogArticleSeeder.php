<?php

namespace Database\Seeders\Post;

use Illuminate\Database\Seeder;
use App\Models\Post\BlogArticle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogArticleSeeder extends Seeder
{
    public function run(): void
    {
        BlogArticle::factory()->count(200)->create();
    }
}
