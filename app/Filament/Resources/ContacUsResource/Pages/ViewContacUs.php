<?php

namespace App\Filament\Resources\ContacUsResource\Pages;

use App\Filament\Resources\ContacUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContacUs extends ViewRecord
{
    protected static string $resource = ContacUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
