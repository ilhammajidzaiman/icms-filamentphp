<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'people_position_id' => '1',
                'order' => '1',
                'name' => 'Rasmus Lerdorf',
                'description' => NULL
            ],
            [
                'people_position_id' => '1',
                'order' => '2',
                'name' => 'Taylor Otwell',
                'description' => NULL
            ],
            [
                'people_position_id' => '1',
                'order' => '3',
                'name' => 'Caleb Porzio',
                'description' => NULL
            ],
            [
                'people_position_id' => '1',
                'order' => '4',
                'name' => 'Dan Harrin',
                'description' => NULL
            ],
            [
                'people_position_id' => '1',
                'order' => '5',
                'name' => 'Brendan Eich',
                'description' => NULL
            ],
        ];
        foreach ($data as $item) :
            People::create(
                [
                    'user_id' => 1,
                    'people_position_id' => $item['people_position_id'],
                    'order' => $item['order'],
                    'name' => Str::headline(Str::lower($item['name'])),
                    'description' => $item['description'],
                ],
            );
        endforeach;
    }
}
