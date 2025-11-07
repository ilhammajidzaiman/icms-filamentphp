<?php

namespace App\Filament\Resources\Media\Videos\Widgets;

use App\Models\Media\Video;
use Illuminate\Support\Str;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), Video::all()->count())
                ->color('primary')
                ->chart([Video::all()->count()]),
            Stat::make(Str::title(__('aktif')), Video::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), Video::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
