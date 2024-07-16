<?php

namespace Database\Seeders;

use App\Models\NavMenu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'parent_id' => -1,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Profil',
            ],
            [
                'parent_id' => 2,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Tentang Kejaksaan',
            ],
            [
                'parent_id' => 2,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Visi Misi',
            ],
            [
                'parent_id' => 2,
                'order' => 3,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Struktur Organisasi',
            ],
            [
                'parent_id' => 2,
                'order' => 4,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Tugas Pokok',
            ],
            [
                'parent_id' => 2,
                'order' => 5,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Doktrin Kejaksaan',
            ],
            [
                'parent_id' => 2,
                'order' => 6,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Perintah Harian Jaksa Agung',
            ],
            [
                'parent_id' => -1,
                'order' => 4,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Informasi',
            ],
            [
                'parent_id' => 9,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Maklumat Pelayanan',
            ],
            [
                'parent_id' => 9,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Tugas Penyelenggara Pip',
            ],
            [
                'parent_id' => 9,
                'order' => 3,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Standar Layanan',
            ],

        ];
        foreach ($data as $item) :
            NavMenu::create(
                [
                    'user_id' => 1,
                    'parent_id' => $item['parent_id'],
                    'order' => $item['order'],
                    'modelable_type' => $item['modelable_type'],
                    'modelable_id' => $item['modelable_id'],
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
