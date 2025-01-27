<?php

namespace App\Filament\Resources\Media\FileCategoryResource\Widgets;

use App\Models\Media\FileCategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class FileCategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', FileCategory::all()->count())
                ->color('primary')
                ->chart([FileCategory::all()->count()]),
            Stat::make('Aktif', FileCategory::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', FileCategory::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
