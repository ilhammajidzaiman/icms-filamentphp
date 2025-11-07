<?php

namespace App\Filament\Resources\Media\Information\Widgets;

use Illuminate\Support\Str;
use App\Models\Media\Information;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), Information::all()->count())
                ->color('primary')
                ->chart([Information::all()->count()]),
            Stat::make(Str::title(__('aktif')), Information::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), Information::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
