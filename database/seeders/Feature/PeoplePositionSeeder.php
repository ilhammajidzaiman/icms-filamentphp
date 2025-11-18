<?php

namespace Database\Seeders\Feature;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Feature\PeoplePosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeoplePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'founder'],
            ['title' => 'co founder'],
            ['title' => 'programmer'],
            ['title' => 'ui/ux'],
            ['title' => 'financial'],
            ['title' => 'customer service'],
        ];
        foreach ($data as $item) :
            PeoplePosition::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::title(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
