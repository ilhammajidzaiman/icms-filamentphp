<?php

namespace App\Filament\Resources\Feature\PeoplePositionResource\Widgets;

use App\Models\Feature\PeoplePosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PeoplePositionOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', PeoplePosition::all()->count())
                ->color('primary')
                ->chart([PeoplePosition::all()->count()]),
            Stat::make('Aktif', PeoplePosition::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', PeoplePosition::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
