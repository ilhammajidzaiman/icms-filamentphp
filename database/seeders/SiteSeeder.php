<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "iCMS Filamenthp V3",
                "email" => "icmsfilamentphpv3@gmail.com",
                "address" => "Jl. Jend. Sudirman No. 375 Pekanbaru",
                "phone" => "(0812) 3456789",
                "map" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6560349774486!2d101.44529257505096!3d0.5167758636869536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac1d09a9b905%3A0xe1c458a97fb867a1!2sKejaksaan%20Tinggi%20Riau!5e0!3m2!1sid!2sid!4v1711598667977!5m2!1sid!2sid",
            ],
        ];
        foreach ($data as $item) :
            Site::create(
                [
                    'name' => $item['name'],
                    'email' => $item['email'],
                    'address' => $item['address'],
                    'phone' => $item['phone'],
                    'map' => $item['map'],
                ],
            );
        endforeach;
    }
}
