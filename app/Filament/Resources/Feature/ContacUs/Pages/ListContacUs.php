<?php

namespace App\Filament\Resources\Feature\ContacUs\Pages;

use App\Filament\Resources\Feature\ContacUs\ContacUsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContacUs extends ListRecords
{
    protected static string $resource = ContacUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
