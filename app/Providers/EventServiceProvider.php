<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Media\File;
use App\Models\Media\Carousel;
use App\Observers\FileObserver;
use App\Observers\SiteObserver;
use App\Observers\UserObserver;
use App\Models\Post\BlogArticle;
use App\Models\Setting\SettingSite;
use App\Observers\CarouselObserver;
use App\Observers\BlogArticleObserver;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        BlogArticle::observe(BlogArticleObserver::class);
        Carousel::observe(CarouselObserver::class);
        File::observe(FileObserver::class);
        // SettingSite::observe(SiteObserver::class);
        User::observe(UserObserver::class);
    }
}
