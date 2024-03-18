<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id'       => 1,
                'title'         => 'Tutorial',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Programming',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Backend',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Frontend',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Filament',
            ],
        ];
        foreach ($datas as $data) :
            Category::create(
                [
                    'user_id' => $data['user_id'],
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                ],
            );
        endforeach;
    }
}
