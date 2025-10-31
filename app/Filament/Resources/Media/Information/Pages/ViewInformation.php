<?php

namespace App\Filament\Resources\Media\Information\Pages;

use App\Filament\Resources\Media\Information\InformationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInformation extends ViewRecord
{
    protected static string $resource = InformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
