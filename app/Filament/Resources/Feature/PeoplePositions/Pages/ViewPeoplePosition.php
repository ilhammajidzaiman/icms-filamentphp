<?php

namespace App\Filament\Resources\Feature\PeoplePositions\Pages;

use App\Filament\Resources\Feature\PeoplePositions\PeoplePositionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPeoplePosition extends ViewRecord
{
    protected static string $resource = PeoplePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
