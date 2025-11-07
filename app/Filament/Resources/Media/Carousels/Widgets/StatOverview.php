<?php

namespace App\Filament\Resources\Media\Carousels\Widgets;

use Illuminate\Support\Str;
use App\Models\Media\Carousel;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), Carousel::all()->count())
                ->color('primary')
                ->chart([Carousel::all()->count()]),
            Stat::make(Str::title(__('aktif')), Carousel::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), Carousel::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
