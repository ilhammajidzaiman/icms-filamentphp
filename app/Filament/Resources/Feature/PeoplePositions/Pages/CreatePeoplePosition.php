<?php

namespace App\Filament\Resources\Feature\PeoplePositions\Pages;

use App\Filament\Resources\Feature\PeoplePositions\PeoplePositionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePeoplePosition extends CreateRecord
{
    protected static string $resource = PeoplePositionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
