<?php

namespace App\Filament\Resources\Setting\SettingPageResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Setting\SettingPageResource;

class CreateSettingPage extends CreateRecord
{
    protected static string $resource = SettingPageResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
