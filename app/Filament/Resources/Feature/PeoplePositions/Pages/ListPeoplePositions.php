<?php

namespace App\Filament\Resources\Feature\PeoplePositions\Pages;

use App\Filament\Resources\Feature\PeoplePositions\PeoplePositionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPeoplePositions extends ListRecords
{
    protected static string $resource = PeoplePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
