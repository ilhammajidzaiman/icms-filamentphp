<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use Filament\Auth\Pages\EditProfile;
use Filament\Navigation\NavigationGroup;
use App\Filament\Pages\Auth\CustomeLogin;
use Filament\Http\Middleware\Authenticate;
use App\Filament\Pages\Auth\CustomeProfile;
use App\Filament\Widgets\CustomeAccountWidget;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use App\Filament\Widgets\CustomeFilamentInfoWidget;
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
            ->login(CustomeLogin::class)
            // ->profile(CustomeProfile::class)
            ->colors([
                'primary' => Color::Sky,
                'secondary' => Color::Slate,
                'success' => Color::Emerald,
                'info' => Color::Blue,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                CustomeAccountWidget::class,
                CustomeFilamentInfoWidget::class,
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
            ->authMiddleware([
                Authenticate::class,
            ])
            ->maxContentWidth('full')
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make()->label("Post"),
                NavigationGroup::make()->label("Media"),
                NavigationGroup::make()->label("Situs")->collapsible(),
                NavigationGroup::make()->label("Fitur")->collapsible(),
                NavigationGroup::make()->label("Pengaturan")->collapsible(),
                NavigationGroup::make()->label("Administrasi")->collapsible(),
            ])
            ->resourceCreatePageRedirect('index')
            ->resourceEditPageRedirect('index');
    }
}
