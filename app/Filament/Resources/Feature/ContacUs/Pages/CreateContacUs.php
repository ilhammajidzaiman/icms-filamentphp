<?php

namespace App\Filament\Resources\Feature\ContacUs\Pages;

use App\Filament\Resources\Feature\ContacUs\ContacUsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContacUs extends CreateRecord
{
    protected static string $resource = ContacUsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
