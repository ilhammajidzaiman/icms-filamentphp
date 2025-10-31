<?php

namespace App\Filament\Resources\Media\FileCategories\Pages;

use App\Filament\Resources\Media\FileCategories\FileCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFileCategories extends ListRecords
{
    protected static string $resource = FileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
