<?php

namespace App\Filament\Resources\ContacUsResource\Pages;

use App\Filament\Resources\ContacUsResource;
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
