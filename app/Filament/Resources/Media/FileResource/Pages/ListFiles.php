<?php

namespace App\Filament\Resources\Media\FileResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Media\FileResource;
use App\Filament\Resources\Media\FileResource\Widgets\FileOverview;

class ListFiles extends ListRecords
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            FileOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua')
                ->icon('heroicon-o-bars-3'),
            'active' => Tab::make('Aktif')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_show', true)),
            'inactive' => Tab::make('Tidak Aktif')
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_show', false)),
        ];
    }
}
