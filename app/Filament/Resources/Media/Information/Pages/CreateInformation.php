<?php

namespace App\Filament\Resources\Media\Information\Pages;

use App\Filament\Resources\Media\Information\InformationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInformation extends CreateRecord
{
    protected static string $resource = InformationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
