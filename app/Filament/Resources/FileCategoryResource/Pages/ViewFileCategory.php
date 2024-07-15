<?php

namespace App\Filament\Resources\FileBlogCategoryResource\Pages;

use App\Filament\Resources\FileBlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFileBlogCategory extends ViewRecord
{
    protected static string $resource = FileBlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
