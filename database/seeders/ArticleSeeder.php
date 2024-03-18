<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id'           => 1,
                'category_id'       => 1,
                'title'             => 'Selamat datang, Ini adalah artikel pertama',
                'content'           => 'Hello world. Selamat datang, Ini adalah artikel pertama anda. Silahkan edit atau hapus artikel ini.',
            ]
        ];
        foreach ($datas as $data) :
            Article::create(
                [
                    'user_id' => $data['user_id'],
                    'category_id' => $data['category_id'],
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                    'content' => $data['content'],
                    'published_at' => now(),
                ],
            );
        endforeach;
    }
}
