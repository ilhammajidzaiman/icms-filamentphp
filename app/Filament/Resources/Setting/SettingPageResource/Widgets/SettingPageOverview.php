<?php

namespace App\Filament\Resources\Setting\SettingPageResource\Widgets;

use App\Models\Setting\SettingPage;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SettingPageOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', SettingPage::all()->count())
                ->color('primary')
                ->chart([SettingPage::all()->count()]),
            Stat::make('Aktif', SettingPage::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', SettingPage::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
