<?php

namespace App\Filament\Widgets;

use App\Models\Site\Page;
use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    // protected ?string $heading = 'Analytics';
    // protected ?string $description = 'An overview of some analytics.';
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        return [
            Stat::make(Str::title(__('artikel')), BlogArticle::all()->count())
                ->chart([3, 4, 10, 7, 8, 2])
                ->color('danger'),
            Stat::make(Str::title(__('topik')), BlogTag::all()->count())
                ->chart([7, 2, 10, 3, 8, 5])
                ->color('success'),
            Stat::make(Str::title(__('kategori')), BlogCategory::all()->count())
                ->chart([3, 4, 10, 7, 8, 1])
                ->color('warning'),
            Stat::make(Str::title(__('halaman')), Page::all()->count())
                ->chart([10, 6, 2, 3, 1, 5])
                ->color('primary'),
        ];
    }
}
