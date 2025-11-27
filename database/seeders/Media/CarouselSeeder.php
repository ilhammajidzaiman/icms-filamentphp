<?php

namespace Database\Seeders\Media;

use App\Models\Media\Carousel;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    public function run(): void
    {
        Carousel::factory()->count(20)->create();
    }
}
