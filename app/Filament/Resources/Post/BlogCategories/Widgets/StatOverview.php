<?php

namespace App\Filament\Resources\Post\BlogCategories\Widgets;

use Illuminate\Support\Str;
use App\Models\Post\BlogCategory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), BlogCategory::all()->count())
                ->color('primary')
                ->chart([BlogCategory::all()->count()]),
            Stat::make(Str::title(__('aktif')), BlogCategory::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), BlogCategory::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
