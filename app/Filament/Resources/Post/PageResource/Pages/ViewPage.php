<?php

namespace App\Filament\Resources\Post\PageResource\Pages;

use App\Filament\Resources\Post\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPage extends ViewRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
