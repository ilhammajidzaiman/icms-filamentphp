<?php

namespace App\Filament\Resources\Media\Videos\Pages;

use Illuminate\Support\Str;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Media\Videos\VideoResource;
use App\Filament\Resources\Media\Videos\Widgets\StatOverview;

class ListVideos extends ListRecords
{
    protected static string $resource = VideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(Str::title(__('semua')))
                ->icon('heroicon-o-bars-3'),
            'active' => Tab::make(Str::title(__('aktif')))
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_show', true)),
            'inactive' => Tab::make(Str::title(__('tidak aktif')))
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_show', false)),
        ];
    }
}
