<?php

namespace App\Providers;

use App\Models\Post\NavMenu;
use App\Models\Setting\Site;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
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
        if ((request()->segment(1)) !== 'admin'):
            View::composer('*', function ($view) {
                $sitePage = Site::first();
                $logo = $sitePage->logo && Storage::disk('public')->exists($sitePage->logo)
                    ? asset('storage/' . $sitePage->logo)
                    : asset('image/laravel.svg');
                $navMenus = NavMenu::where('parent_id', -1)
                    ->with([
                        'children',
                        // 'children.children',
                        // 'children.modelable',
                        // 'modelable'
                    ])
                    ->orderBy('order')
                    ->get();
                $data['sitePage'] = (object)[
                    'name' => $sitePage->name,
                    'address' => $sitePage->address,
                    'phone' => $sitePage->phone,
                    'email' => $sitePage->email,
                    'map' => $sitePage->map,
                    'socialMedia' => $sitePage->social_media,
                    'logo' => $logo,
                    'navMenus' => $navMenus,
                ];
                $view->with($data);
            });
        endif;
    }
}
