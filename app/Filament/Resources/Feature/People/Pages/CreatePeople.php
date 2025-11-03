<?php

namespace App\Filament\Resources\Feature\People\Pages;

use App\Filament\Resources\Feature\People\PeopleResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePeople extends CreateRecord
{
    protected static string $resource = PeopleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
