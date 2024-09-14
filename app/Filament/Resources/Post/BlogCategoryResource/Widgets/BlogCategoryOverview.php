<?php

namespace App\Filament\Resources\Post\BlogCategoryResource\Widgets;

use App\Models\Post\BlogCategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BlogCategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', BlogCategory::all()->count())
                ->color('primary')
                ->chart([BlogCategory::all()->count()]),
            Stat::make('Aktif', BlogCategory::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', BlogCategory::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
