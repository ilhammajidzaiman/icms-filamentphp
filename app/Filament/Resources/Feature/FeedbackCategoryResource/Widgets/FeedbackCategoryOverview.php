<?php

namespace App\Filament\Resources\Feature\FeedbackCategoryResource\Widgets;

use App\Models\Feature\FeedbackCategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class FeedbackCategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', FeedbackCategory::all()->count())
                ->color('primary')
                ->chart([FeedbackCategory::all()->count()]),
            Stat::make('Aktif', FeedbackCategory::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', FeedbackCategory::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
