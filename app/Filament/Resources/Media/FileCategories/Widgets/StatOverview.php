<?php

namespace App\Filament\Resources\Media\FileCategories\Widgets;

use Illuminate\Support\Str;
use App\Models\Media\FileCategory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), FileCategory::all()->count())
                ->color('primary')
                ->chart([FileCategory::all()->count()]),
            Stat::make(Str::title(__('aktif')), FileCategory::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), FileCategory::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
