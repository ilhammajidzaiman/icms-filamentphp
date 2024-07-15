<?php

namespace App\Filament\Resources\BlogTagResource\Widgets;

use App\Models\BlogTag;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BlogTagOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', BlogTag::all()->count())
                ->color('primary')
                ->chart([BlogTag::all()->count()]),
            Stat::make('Aktif', BlogTag::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', BlogTag::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
