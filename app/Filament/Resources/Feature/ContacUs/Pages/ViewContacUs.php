<?php

namespace App\Filament\Resources\Feature\ContacUs\Pages;

use App\Filament\Resources\Feature\ContacUs\ContacUsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewContacUs extends ViewRecord
{
    protected static string $resource = ContacUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
