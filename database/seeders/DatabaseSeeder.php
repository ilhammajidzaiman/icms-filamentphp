<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SiteSeeder::class,
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            BlogArticleSeeder::class,
            PageSeeder::class,
            FileCategorySeeder::class,
            FileSeeder::class,
            LinkSeeder::class,
            CarouselSeeder::class,
            NavMenuSeeder::class,
            ImageSeeder::class,
            PeoplePositionSeeder::class,
            PeopleSeeder::class,
            FeedbackCategorySeeder::class,
        ]);
    }
}
