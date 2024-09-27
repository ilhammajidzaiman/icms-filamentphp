<?php

namespace App\Filament\Resources\Media\CarouselResource\Widgets;

use App\Models\Media\Carousel;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CarouselOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Carousel::all()->count())
                ->color('primary')
                ->chart([Carousel::all()->count()]),
            Stat::make('Aktif', Carousel::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Carousel::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
