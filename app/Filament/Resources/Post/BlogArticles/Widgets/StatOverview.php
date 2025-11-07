<?php

namespace App\Filament\Resources\Post\BlogArticles\Widgets;

use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('semua')), BlogArticle::all()->count())
                ->color('primary')
                ->chart([BlogArticle::all()->count()]),
            Stat::make(Str::title(__('aktif')), BlogArticle::where('is_show', true)->count())
                ->color('success'),
            Stat::make(Str::title(__('tidak aktif')), BlogArticle::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
