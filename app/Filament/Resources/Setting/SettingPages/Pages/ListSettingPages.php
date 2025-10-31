<?php

namespace App\Filament\Resources\Setting\SettingPages\Pages;

use App\Filament\Resources\Setting\SettingPages\SettingPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettingPages extends ListRecords
{
    protected static string $resource = SettingPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
