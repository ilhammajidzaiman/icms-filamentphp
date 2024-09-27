<?php

namespace App\Filament\Resources\Feature\PeoplePositionResource\Pages;

use App\Filament\Resources\Feature\PeoplePositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeoplePositions extends ListRecords
{
    protected static string $resource = PeoplePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
