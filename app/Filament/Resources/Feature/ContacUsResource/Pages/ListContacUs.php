<?php

namespace App\Filament\Resources\Feature\ContacUsResource\Pages;

use App\Filament\Resources\Feature\ContacUsResource;
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
