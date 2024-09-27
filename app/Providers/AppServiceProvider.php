<?php

namespace App\Providers;

use App\Models\Post\NavMenu;
use App\Models\Setting\Site;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            // service for get site description
            $site = Site::first();
            $default = asset('image/laravel.svg');

            if ($site->logo) :
                if (Storage::disk('public')->exists($site->logo)) :
                    $logo = Storage::disk('public')->url($site->logo);
                else :
                    $logo = $default;
                endif;
            else :
                $logo = $default;
            endif;

            // service for navmenu
            $navMenus = NavMenu::where('parent_id', -1)
                ->with('children')
                ->orderBy('order')
                ->get();

            $view->with([
                'site' => $site,
                'logo' => $logo,
                'navMenus' => $navMenus,
            ]);
        });
    }
}
