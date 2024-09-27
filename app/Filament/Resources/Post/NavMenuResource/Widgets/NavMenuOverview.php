<?php

namespace App\Filament\Resources\Post\NavMenuResource\Widgets;

use App\Models\Post\NavMenu;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class NavMenuOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', NavMenu::all()->count())
                ->color('primary')
                ->chart([NavMenu::all()->count()]),
            Stat::make('Aktif', NavMenu::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', NavMenu::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
