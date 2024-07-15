<?php

namespace App\Filament\Resources\BlogTagResource\Pages;

use Filament\Actions;
use App\Filament\Resources\BlogTagResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BlogTagResource\Widgets\BlogTagOverview;

class ListBlogTags extends ListRecords
{
    protected static string $resource = BlogTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BlogTagOverview::class,
        ];
    }
}
