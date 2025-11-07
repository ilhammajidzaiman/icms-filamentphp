<?php

namespace App\Filament\Resources\Media\Files\Widgets;

use App\Models\Media\File;
use Illuminate\Support\Str;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), File::all()->count())
                ->color('primary')
                ->chart([File::all()->count()]),
            Stat::make(Str::title(__('aktif')), File::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), File::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
