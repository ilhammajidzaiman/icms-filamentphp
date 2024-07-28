<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\FileCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'dokumentasi',],
            ['title' => 'produk',],
        ];
        foreach ($data as $item) :
            FileCategory::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
