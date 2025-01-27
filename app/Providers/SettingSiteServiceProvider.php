<?php

namespace App\Providers;

use App\Models\Post\NavMenu;
use App\Models\Setting\SettingSite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class SettingSiteServiceProvider extends ServiceProvider
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
                $settingSite = SettingSite::first();
                $logo = $settingSite->logo && Storage::disk('public')->exists($settingSite->logo)
                    ? asset('storage/' . $settingSite->logo)
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
                $data['settingSite'] = (object)[
                    'name' => $settingSite->name,
                    'address' => $settingSite->address,
                    'phone' => $settingSite->phone,
                    'email' => $settingSite->email,
                    'map' => $settingSite->map,
                    'socialMedia' => $settingSite->social_media,
                    'logo' => $logo,
                    'navMenus' => $navMenus,
                ];
                $view->with($data);
            });
        endif;
    }
}
