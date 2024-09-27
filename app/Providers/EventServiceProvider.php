<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Media\File;
use App\Models\Setting\Site;
use App\Models\Media\Carousel;
use App\Observers\FileObserver;
use App\Observers\SiteObserver;
use App\Observers\UserObserver;
use App\Models\Post\BlogArticle;
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
        User::observe(UserObserver::class);
        BlogArticle::observe(BlogArticleObserver::class);
        Carousel::observe(CarouselObserver::class);
        File::observe(FileObserver::class);
        Site::observe(SiteObserver::class);
    }
}
