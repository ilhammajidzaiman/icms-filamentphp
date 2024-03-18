<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id'       => 1,
                'title'         => 'Html',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Css',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Bootstrap',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Tailwind',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Php',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Javascript',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Laravel',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Livewire',
            ],
            [
                'user_id'       => 1,
                'title'         => 'Filament',
            ],
        ];
        foreach ($datas as $data) :
            Tag::create(
                [
                    'user_id' => $data['user_id'],
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                ],
            );
        endforeach;
    }
}
