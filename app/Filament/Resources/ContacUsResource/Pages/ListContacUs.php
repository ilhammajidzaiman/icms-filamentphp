<?php

namespace App\Filament\Resources\ContacUsResource\Pages;

use App\Filament\Resources\ContacUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacUs extends ListRecords
{
    protected static string $resource = ContacUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
