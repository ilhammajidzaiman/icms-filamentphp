<?php

namespace Database\Factories\Post;

use Illuminate\Support\Str;
use App\Models\Post\BlogPost;
use App\Models\Post\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogArticleFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        $randomImages = collect(range(1, 200))
            ->shuffle()
            ->take(6)
            ->map(fn($num) => "files/image_{$num}.jpg")
            ->values()
            ->toArray();
        return [
            'user_id' => 1,
            'blog_category_id' => BlogCategory::inRandomOrder()->first()->id,
            'slug' => Str::slug($this->faker->sentence(15)),
            'title' => $this->faker->sentence(15),
            'content' => $this->faker->paragraphs(20, true),
            'file' => "/files/image_{$imageNumber}.jpg",
            'description' => $this->faker->sentence(20),
            'attachment' => $randomImages,
            'published_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($article) {
            $data = collect(range(1, 9))
                ->shuffle()
                ->take(6)
                ->toArray();
            foreach ($data as $item) {
                BlogPost::updateOrCreate(
                    [
                        'blog_article_id' => $article->id,
                        'blog_tag_id' => $item,
                    ],
                );
            }
        });
    }
}
