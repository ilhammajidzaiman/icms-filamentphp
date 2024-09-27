<?php

namespace App\Filament\Widgets;

use App\Models\Post\Page;
use App\Models\Post\BlogTag;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Artikel', BlogArticle::all()->count())
                ->chart([3, 4, 10, 7, 8, 2])
                ->color('danger'),
            Stat::make('Topik', BlogTag::all()->count())
                ->chart([7, 2, 10, 3, 8, 5])
                ->color('success'),
            Stat::make('Kategori', BlogCategory::all()->count())
                ->chart([3, 4, 10, 7, 8, 1])
                ->color('warning'),
            Stat::make('Halaman', Page::all()->count())
                ->chart([10, 6, 2, 3, 1, 5])
                ->color('primary'),
        ];
    }
}
