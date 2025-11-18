<?php

namespace Database\Seeders\Media;

use App\Models\Media\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    public function run(): void
    {
        File::factory()->count(200)->create();
    }
}
