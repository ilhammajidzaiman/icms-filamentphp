<?php

namespace App\Filament\Resources\Media\Images\Widgets;

use App\Models\Media\Image;
use Illuminate\Support\Str;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), Image::all()->count())
                ->color('primary')
                ->chart([Image::all()->count()]),
            Stat::make(Str::title(__('aktif')), Image::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), Image::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
