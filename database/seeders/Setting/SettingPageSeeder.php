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
            ],
            [
                "title" => "headline",
                "type" => "section-home",
            ],
            [
                "title" => "image",
                "type" => "section-home",
            ],
            [
                "title" => "people",
                "type" => "section-home",
            ],
            [
                "title" => "video",
                "type" => "section-home",
            ]
        ];
        foreach ($data as $item) :
            SettingPage::create(
                [
                    'title' => $item['title'],
                    'type' => $item['type'],
                ],
            );
        endforeach;
    }
}
