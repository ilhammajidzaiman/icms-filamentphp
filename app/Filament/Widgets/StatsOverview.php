<?php

namespace App\Filament\Widgets;

use App\Models\File;
use App\Models\Link;
use App\Models\Page;
use App\Models\User;
use App\Models\Image;
use App\Models\Video;
use App\Models\BlogTag;
use App\Models\Carousel;
use App\Models\BlogArticle;
use App\Models\Information;
use App\Models\BlogCategory;
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
                ->chart([3, 4, 10, 7, 8, 1, 6])
                ->color('danger'),
            Stat::make('Topik', BlogTag::all()->count())
                ->chart([7, 2, 10, 3, 8, 5, 9])
                ->color('success'),
            Stat::make('Kategori', BlogCategory::all()->count())
                ->chart([3, 4, 10, 7, 8, 1, 6])
                ->color('warning'),
            Stat::make('Halaman', Page::all()->count())
                ->chart([10, 6, 2, 3, 1, 5, 9])
                ->color('primary'),
        ];
    }
}
