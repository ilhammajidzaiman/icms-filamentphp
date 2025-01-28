<?php

namespace App\Filament\Resources\Setting\SettingPageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Setting\SettingPageResource;

class ViewSettingPage extends ViewRecord
{
    protected static string $resource = SettingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
