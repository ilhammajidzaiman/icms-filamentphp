<?php

namespace App\Filament\Resources\Post\BlogArticleResource\Widgets;

use App\Models\Post\BlogArticle;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BlogArticleOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', BlogArticle::all()->count())
                ->color('primary')
                ->chart([BlogArticle::all()->count()]),
            Stat::make('Aktif', BlogArticle::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', BlogArticle::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
