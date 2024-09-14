<?php

namespace App\Filament\Resources\Post\BlogCategoryResource\Pages;

use App\Filament\Resources\Post\BlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogCategory extends ViewRecord
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
