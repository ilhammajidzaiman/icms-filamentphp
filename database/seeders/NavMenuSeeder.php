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
                "parent_id" => "-1",
                "order" => "1",
                "modelable_type" => "App\\Models\\Page",
                "modelable_id" => "1",
                "title" => "About",
            ],
            [
                "parent_id" => "1",
                "order" => "1",
                "modelable_type" => "App\\Models\\Page",
                "modelable_id" => "1",
                "title" => "Profil",
            ],
            [
                "parent_id" => "1",
                "order" => "2",
                "modelable_type" => "App\\Models\\Page",
                "modelable_id" => "1",
                "title" => "Service",
            ],
            [
                "parent_id" => "1",
                "order" => "3",
                "modelable_type" => "App\\Models\\Page",
                "modelable_id" => "1",
                "title" => "Product",
            ],
            [
                "parent_id" => "-1",
                "order" => "2",
                "modelable_type" => "App\\Models\\Page",
                "modelable_id" => "1",
                "title" => "Contac",
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
