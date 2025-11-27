<?php

namespace Database\Seeders\Site;

use App\Models\Site\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title'     => 'Selamat datang',
                'content'   => 'Hello world. Selamat datang, Ini adalah halaman pertama anda. Silahkan edit atau hapus halaman ini.',
            ]
        ];
        foreach ($datas as $data) :
            Page::create(
                [
                    'user_id' => 1,
                    'slug' => trim(Str::slug($data['title'])),
                    'title' => trim(Str::title(Str::lower($data['title']))),
                    'content' => trim($data['content']),
                ],
            );
        endforeach;
    }
}
