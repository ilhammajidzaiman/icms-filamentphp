<?php

namespace App\Filament\Resources\Media\FileResource\Pages;

use App\Filament\Resources\Media\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFile extends ViewRecord
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
