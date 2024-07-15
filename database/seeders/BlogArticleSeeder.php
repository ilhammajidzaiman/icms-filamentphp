<?php

namespace Database\Seeders;

use App\Models\BlogArticle;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'blog_category_id'       => 1,
                'title'             => 'Selamat datang, Ini adalah artikel pertama',
                'content'           => 'Hello world. Selamat datang, Ini adalah artikel pertama anda. Silahkan edit atau hapus artikel ini.',
            ]
        ];
        foreach ($datas as $data) :
            BlogArticle::create(
                [
                    'user_id' => 1,
                    'blog_category_id' => $data['blog_category_id'],
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                    'content' => $data['content'],
                    'published_at' => now(),
                ],
            );
        endforeach;
    }
}
