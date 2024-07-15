<?php

namespace App\Filament\Resources\BlogCategoryResource\Pages;

use Filament\Actions;
use App\Models\BlogCategory;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BlogCategoryResource;
use App\Filament\Resources\BlogCategoryResource\Widgets\BlogCategoryOverview;

class ListCategories extends ListRecords
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
}
