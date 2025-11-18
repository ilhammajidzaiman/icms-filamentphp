<?php

namespace Database\Factories\Feature;

use Illuminate\Support\Str;
use App\Models\Feature\PeoplePosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        return [
            'user_id' => 1,
            'people_position_id' => PeoplePosition::whereNotIn('id', [1, 2])->inRandomOrder()->value('id'),
            'order' => $imageNumber,
            'name' => Str::title($this->faker->sentence(2)),
            'description' => $this->faker->sentence(20),
            'file' => "/files/image_{$imageNumber}.jpg",
        ];
    }
}
