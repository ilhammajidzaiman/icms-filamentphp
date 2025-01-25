<?php

namespace App\Filament\Resources\Feature\FeedbackResource\Widgets;

use App\Models\Feature\Feedback;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class FeedbackOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', Feedback::all()->count())
                ->color('primary')
                ->chart([Feedback::all()->count()]),
            Stat::make('Aktif', Feedback::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', Feedback::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
