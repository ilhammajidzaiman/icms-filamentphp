<?php

namespace App\Filament\Resources\Post\BlogTagResource\Pages;

use App\Filament\Resources\Post\BlogTagResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogTag extends ViewRecord
{
    protected static string $resource = BlogTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
