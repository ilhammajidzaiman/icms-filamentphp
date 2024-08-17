<?php

namespace App\Filament\Resources\BlogCategoryResource\Pages;

use Filament\Actions;
use App\Models\BlogCategory;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Query\Builder;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BlogCategoryResource;
use App\Filament\Resources\BlogCategoryResource\Widgets\BlogCategoryOverview;

class ListBlogCategories extends ListRecords
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BlogCategoryOverview::class,
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
