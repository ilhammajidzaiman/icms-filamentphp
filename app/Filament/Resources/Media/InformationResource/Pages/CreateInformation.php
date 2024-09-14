<?php

namespace App\Filament\Resources\Media\InformationResource\Pages;

use App\Filament\Resources\Media\InformationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformation extends CreateRecord
{
    protected static string $resource = InformationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
