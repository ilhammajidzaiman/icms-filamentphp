<?php

namespace App\Filament\Resources\Post\BlogCategories\Pages;

use App\Filament\Resources\Post\BlogCategories\BlogCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogCategory extends ViewRecord
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
