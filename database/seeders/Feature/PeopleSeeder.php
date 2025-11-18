<?php

namespace Database\Seeders\Feature;

use App\Models\Feature\People;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        People::factory()->count(200)->create();
    }
}
