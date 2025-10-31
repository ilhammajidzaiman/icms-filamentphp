<?php

namespace App\Filament\Resources\Media\FileCategories\Pages;

use App\Filament\Resources\Media\FileCategories\FileCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFileCategory extends ViewRecord
{
    protected static string $resource = FileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
