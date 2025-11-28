<?php

namespace Database\Seeders\Setting;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Setting\NavigationFooter;

class NavigationFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "parent_id" => -1,
                "order" => 1,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Peta Situs"
            ],
            [
                "id" => 2,
                "parent_id" => -1,
                "order" => 2,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Tentang Kami"
            ],
            [
                "id" => 3,
                "parent_id" => -1,
                "order" => 3,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Lainnya"
            ],
            [
                "id" => 4,
                "parent_id" => 1,
                "order" => 1,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Beranda"
            ],
            [
                "id" => 5,
                "parent_id" => 1,
                "order" => 2,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Profil"
            ],
            [
                "id" => 6,
                "parent_id" => 2,
                "order" => 1,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Teknologi"
            ],
            [
                "id" => 7,
                "parent_id" => 2,
                "order" => 2,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Layanan"
            ],
            [
                "id" => 8,
                "parent_id" => 2,
                "order" => 3,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Tim"
            ],
            [
                "id" => 9,
                "parent_id" => 2,
                "order" => 4,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Mitra"
            ],
            [
                "id" => 10,
                "parent_id" => 3,
                "order" => 1,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Kritik Saran"
            ],
            [
                "id" => 11,
                "parent_id" => 3,
                "order" => 2,
                "modelable_type" => "App\Models\Site\Page",
                "modelable_id" => 1,
                "title" => "Hubungi Kami"
            ]
        ];
        foreach ($data as $item) :
            NavigationFooter::create(
                [
                    // 'id' => trim($item['id']),
                    'user_id' => 1,
                    'parent_id' => trim($item['parent_id']),
                    'order' => trim($item['order']),
                    'modelable_type' => trim($item['modelable_type']),
                    'modelable_id' => trim($item['modelable_id']),
                    'slug' => trim(Str::slug($item['title'])),
                    'title' => trim(Str::title(Str::lower($item['title']))),
                ],
            );
        endforeach;
    }
}
