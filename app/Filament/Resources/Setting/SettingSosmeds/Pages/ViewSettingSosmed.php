<?php

namespace App\Filament\Resources\Setting\SettingSosmeds\Pages;

use App\Filament\Resources\Setting\SettingSosmeds\SettingSosmedResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSettingSosmed extends ViewRecord
{
    protected static string $resource = SettingSosmedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
