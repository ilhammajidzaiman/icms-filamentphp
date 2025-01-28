<?php

namespace Database\Seeders\Setting;

use Illuminate\Database\Seeder;
use App\Models\Setting\SettingPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title" => "carousel",
                "type" => "section-home",
                "is_show" => true,
            ],
            [
                "title" => "headline",
                "type" => "section-home",
                "is_show" => true,
            ],
            [
                "title" => "image",
                "type" => "section-home",
                "is_show" => true,
            ],
            [
                "title" => "people",
                "type" => "section-home",
                "is_show" => true,
            ],
            [
                "title" => "video",
                "type" => "section-home",
                "is_show" => true,
            ]
        ];
        foreach ($data as $item) :
            SettingPage::create(
                [
                    'title' => $item['title'],
                    'type' => $item['type'],
                    "is_show" => true,
                ],
            );
        endforeach;
    }
}
