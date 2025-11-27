<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // setting
            Setting\UserSeeder::class,
            Setting\NavigationMenuSeeder::class,
            Setting\NavigationFooterSeeder::class,
            // Setting\SettingSiteSeeder::class,
            // Setting\SettingPageSeeder::class,

            // media
            Media\FileCategorySeeder::class,
            Media\FileSeeder::class,
            Media\CarouselSeeder::class,
            Media\ImageSeeder::class,
            Media\VideoSeeder::class,

            // post
            Post\BlogCategorySeeder::class,
            Post\BlogTagSeeder::class,
            Post\BlogArticleSeeder::class,
            // Post\PageSeeder::class,
            // Post\LinkSeeder::class,

            // site
            Site\PageSeeder::class,


            // feature
            Feature\PeoplePositionSeeder::class,
            Feature\PeopleSeeder::class,
            Feature\FeedbackCategorySeeder::class,
            Feature\PartnerSeeder::class,
            Feature\TechnologySeeder::class,
            Feature\ServiceSeeder::class,
        ]);
    }
}
