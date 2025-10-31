<?php

namespace App\Filament\Resources\Setting\SettingPages\Pages;

use App\Filament\Resources\Setting\SettingPages\SettingPageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSettingPage extends ViewRecord
{
    protected static string $resource = SettingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
