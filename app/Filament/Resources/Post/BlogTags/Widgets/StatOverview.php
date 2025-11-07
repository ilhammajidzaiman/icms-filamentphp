<?php

namespace App\Filament\Resources\Post\BlogTags\Widgets;

use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), BlogTag::all()->count())
                ->color('primary')
                ->chart([BlogTag::all()->count()]),
            Stat::make(Str::title(__('aktif')), BlogTag::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), BlogTag::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
