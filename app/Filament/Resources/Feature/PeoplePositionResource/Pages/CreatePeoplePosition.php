<?php

namespace App\Filament\Resources\Feature\PeoplePositionResource\Pages;

use App\Filament\Resources\Feature\PeoplePositionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeoplePosition extends CreateRecord
{
    protected static string $resource = PeoplePositionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
