<?php

namespace App\Filament\Resources\Media\Information\Pages;

use App\Filament\Resources\Media\Information\InformationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInformation extends ListRecords
{
    protected static string $resource = InformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
