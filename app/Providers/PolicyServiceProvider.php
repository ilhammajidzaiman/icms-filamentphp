<?php

namespace App\Providers;

use App\Models;
use App\Policies;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
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
        Gate::policy(Models\Post\BlogArticle::class, Policies\Post\BlogArticlePolicy::class);
        Gate::policy(Models\Post\BlogCategory::class, Policies\Post\BlogCategoryPolicy::class);
        Gate::policy(Models\Post\BlogTag::class, Policies\Post\BlogTagPolicy::class);
        Gate::policy(Models\Post\Page::class, Policies\Post\PagePolicy::class);
        Gate::policy(Models\Post\Link::class, Policies\Post\LinkPolicy::class);
        Gate::policy(Models\Post\NavMenu::class, Policies\Post\NavMenuPolicy::class);
        Gate::policy(Models\Media\Carousel::class, Policies\Media\CarouselPolicy::class);
        Gate::policy(Models\Media\File::class, Policies\Media\FilePolicy::class);
        Gate::policy(Models\Media\FileCategory::class, Policies\Media\FileCategoryPolicy::class);
        Gate::policy(Models\Media\Image::class, Policies\Media\ImagePolicy::class);
        Gate::policy(Models\Media\Information::class, Policies\Media\InformationPolicy::class);
        Gate::policy(Models\Media\Video::class, Policies\Media\VideoPolicy::class);
        Gate::policy(Models\Feature\ContacUs::class, Policies\Feature\ContacUsPolicy::class);
        Gate::policy(Models\Feature\Feedback::class, Policies\Feature\FeedbackPolicy::class);
        Gate::policy(Models\Feature\FeedbackCategory::class, Policies\Feature\FeedbackCategoryPolicy::class);
        Gate::policy(Models\Feature\People::class, Policies\Feature\PeoplePolicy::class);
        Gate::policy(Models\Feature\PeoplePosition::class, Policies\Feature\PeoplePositionPolicy::class);
    }
}
