<?php

namespace App\Filament\Resources\FileBlogCategoryResource\Pages;

use App\Filament\Resources\FileBlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFileCategories extends ListRecords
{
    protected static string $resource = FileBlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
