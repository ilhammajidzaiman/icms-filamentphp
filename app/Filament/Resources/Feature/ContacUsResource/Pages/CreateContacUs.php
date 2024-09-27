<?php

namespace App\Filament\Resources\Feature\ContacUsResource\Pages;

use App\Filament\Resources\Feature\ContacUsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContacUs extends CreateRecord
{
    protected static string $resource = ContacUsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
