<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Pages\Auth\Login;
use Filament\Support\Colors\Color;
use App\Models\Setting\SettingSite;
use App\Filament\Widgets\AccountWidget;
use Illuminate\Support\Facades\Storage;
use App\Filament\Pages\Auth\EditProfile;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->profile(EditProfile::class)
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Slate,
                'success' => Color::Emerald,
                'info' => Color::Blue,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->maxContentWidth('full')
            ->sidebarCollapsibleOnDesktop()
            ->favicon(
                function () {
                    $data = SettingSite::first();
                    $default = asset('image/laravel.svg');
                    if ($data->favicon) :
                        if (Storage::disk('public')->exists($data->favicon)) :
                            return Storage::disk('public')->url($data->favicon);
                        else :
                            return $default;
                        endif;
                    else :
                        return $default;
                    endif;
                }
            )
            ->brandLogo(
                function () {
                    $data = SettingSite::first();
                    $default = asset('image/laravel.svg');
                    if ($data->logo) :
                        if (Storage::disk('public')->exists($data->logo)) :
                            return Storage::disk('public')->url($data->logo);
                        else :
                            return $default;
                        endif;
                    else :
                        return $default;
                    endif;
                }
            )
            ->brandLogoHeight(fn(): string => auth()->user() ? '2.5rem' : '5rem')
            ->navigationGroups([
                NavigationGroup::make()->label("Blog"),
                NavigationGroup::make()->label("Media"),
                NavigationGroup::make()->label("Fitur")->collapsible(),
                NavigationGroup::make()->label("Pengaturan")->collapsible(),
            ]);
    }
}
