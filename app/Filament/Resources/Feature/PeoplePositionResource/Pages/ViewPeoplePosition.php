<?php

namespace App\Filament\Resources\Feature\PeoplePositionResource\Pages;

use App\Filament\Resources\Feature\PeoplePositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeoplePosition extends ViewRecord
{
    protected static string $resource = PeoplePositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
