<?php

namespace App\Filament\Resources\Media\InformationResource\Pages;

use App\Filament\Resources\Media\InformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInformation extends ViewRecord
{
    protected static string $resource = InformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
