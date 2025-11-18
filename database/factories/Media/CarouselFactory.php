<?php

namespace Database\Factories\Media;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        return [
            'user_id' => 1,
            'slug' => Str::slug($this->faker->sentence(15)),
            'title' => $this->faker->sentence(15),
            'description' => $this->faker->sentence(20),
            'file' => "/files/image_{$imageNumber}.jpg",
        ];
    }
}
