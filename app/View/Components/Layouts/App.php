<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use App\Models\Setting\SettingSite;
use Illuminate\Contracts\View\View;
use App\Enums\SettingSiteOptionEnum;

class App extends Component
{

    public object $data;

    public function __construct()
    {
        $settings = SettingSite::query()
            ->whereIn('title', [
                SettingSiteOptionEnum::SiteName->value,
                SettingSiteOptionEnum::SiteTagline->value,
                SettingSiteOptionEnum::SiteFavicon->value,
                SettingSiteOptionEnum::SiteLogo->value,
                SettingSiteOptionEnum::SiteEmail->value,
                SettingSiteOptionEnum::SiteAddress->value,
                SettingSiteOptionEnum::SitePhone->value,
                SettingSiteOptionEnum::SiteMap->value,
            ])
            ->pluck('description', 'title')
            ->toArray();
        $this->data = (object) [
            'name' => $settings[SettingSiteOptionEnum::SiteName->value] ?? null,
            'tagline' => $settings[SettingSiteOptionEnum::SiteTagline->value] ?? null,
            'favicon' => $settings[SettingSiteOptionEnum::SiteFavicon->value] ?? null,
            'logo' => $settings[SettingSiteOptionEnum::SiteLogo->value] ?? null,
            'email' => $settings[SettingSiteOptionEnum::SiteEmail->value] ?? null,
            'address' => $settings[SettingSiteOptionEnum::SiteAddress->value] ?? null,
            'phone' => $settings[SettingSiteOptionEnum::SitePhone->value] ?? null,
            'map' => $settings[SettingSiteOptionEnum::SiteMap->value] ?? null,
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.app', [
            'siteSetting' => $this->data,
        ]);
    }
}
