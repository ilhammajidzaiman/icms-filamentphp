<?php

namespace Database\Seeders\Feature;


use App\Models\Feature\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::factory()->count(50)->create();
    }
}
