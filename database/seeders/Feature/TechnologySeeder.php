<?php

namespace Database\Seeders\Feature;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Feature\Technology;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'bootstrap',
                'file' => '/seeder/techicons/bootstrap.svg',
            ],
            [
                'title' => 'codeigniter',
                'file' => '/seeder/techicons/codeigniter.svg',
            ],
            [
                'title' => 'css3',
                'file' => '/seeder/techicons/css3.svg',
            ],
            [
                'title' => 'gimp',
                'file' => '/seeder/techicons/gimp.svg',
            ],
            [
                'title' => 'git',
                'file' => '/seeder/techicons/git.svg',
            ],
            [
                'title' => 'github',
                'file' => '/seeder/techicons/github.svg',
            ],
            [
                'title' => 'html5',
                'file' => '/seeder/techicons/html5.svg',
            ],
            [
                'title' => 'inkscape',
                'file' => '/seeder/techicons/inkscape.svg',
            ],
            [
                'title' => 'javascript',
                'file' => '/seeder/techicons/javascript.svg',
            ],
            [
                'title' => 'laravel',
                'file' => '/seeder/techicons/laravel.svg',
            ],
            [
                'title' => 'linux',
                'file' => '/seeder/techicons/linux.svg',
            ],
            [
                'title' => 'livewire',
                'file' => '/seeder/techicons/livewire.svg',
            ],
            [
                'title' => 'mysql',
                'file' => '/seeder/techicons/mysql.svg',
            ],
            [
                'title' => 'php',
                'file' => '/seeder/techicons/php.svg',
            ],
            [
                'title' => 'postgressql',
                'file' => '/seeder/techicons/postgressql.svg',
            ],
            [
                'title' => 'tailwindcss',
                'file' => '/seeder/techicons/tailwindcss.svg',
            ],
            [
                'title' => 'ubuntu',
                'file' => '/seeder/techicons/ubuntu.svg',
            ],
            [
                'title' => 'vue',
                'file' => '/seeder/techicons/vue.svg',
            ],
        ];
        foreach ($data as $item) :
            Technology::create(
                [
                    'user_id' => 1,
                    'slug' => trim(Str::slug($item['title'])),
                    'title' => trim(Str::title(Str::lower($item['title']))),
                    'file' => trim($item['file']),
                ],
            );
        endforeach;
    }
}
