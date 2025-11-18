<?php

namespace Database\Factories\Media;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        return [
            'user_id' => 1,
            'slug' => Str::slug($this->faker->sentence(15)),
            'title' => $this->faker->sentence(15),
            'file' => "/files/image_{$imageNumber}.jpg",
        ];
    }
}
