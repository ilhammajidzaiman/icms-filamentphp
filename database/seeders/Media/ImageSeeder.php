<?php

namespace Database\Seeders\Media;

use App\Models\Media\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        Image::factory()->count(200)->create();
    }
}
