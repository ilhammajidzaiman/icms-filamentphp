<?php

namespace Database\Seeders\Feature;

use App\Models\Feature\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::factory()->count(20)->create();
    }
}
