<?php

namespace Database\Factories\Feature;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        return [
            'user_id' => 1,
            'slug' => trim(Str::slug($this->faker->sentence(2))),
            'title' => trim(Str::title($this->faker->sentence(2))),
            'description' => trim($this->faker->paragraphs(5, true)),
            'file' => "/seeder/images/image_{$imageNumber}.jpg",
        ];
    }
}
