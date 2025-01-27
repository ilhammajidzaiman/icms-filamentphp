<?php

namespace App\Filament\Resources\Media\FileCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Media\FileCategoryResource;
use App\Filament\Resources\Media\FileCategoryResource\Widgets\FileCategoryOverview;

class ListFileCategories extends ListRecords
{
    protected static string $resource = FileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            FileCategoryOverview::class,
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
