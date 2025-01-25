<?php

namespace App\Filament\Resources\Feature\PeopleResource\Widgets;

use App\Models\Feature\People;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PeopleOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Semua', People::all()->count())
                ->color('primary')
                ->chart([People::all()->count()]),
            Stat::make('Aktif', People::where('is_show', true)->count())
                ->color('success'),
            Stat::make('Tidak Aktif', People::where('is_show', false)->count())
                ->color('warning'),
        ];
    }
}
