<?php

namespace App\Filament\Resources\Setting\SettingPages\Pages;

use App\Filament\Resources\Setting\SettingPages\SettingPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSettingPage extends CreateRecord
{
    protected static string $resource = SettingPageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
