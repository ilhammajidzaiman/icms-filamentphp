<?php

namespace App\Filament\Resources\Post\BlogTags\Pages;

use App\Filament\Resources\Post\BlogTags\BlogTagResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogTag extends ViewRecord
{
    protected static string $resource = BlogTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
