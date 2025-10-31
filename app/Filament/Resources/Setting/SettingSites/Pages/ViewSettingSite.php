<?php

namespace App\Filament\Resources\Setting\SettingSites\Pages;

use App\Filament\Resources\Setting\SettingSites\SettingSiteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSettingSite extends ViewRecord
{
    protected static string $resource = SettingSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
