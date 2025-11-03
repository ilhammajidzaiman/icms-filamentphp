<?php

namespace App\Filament\Resources\Setting\SettingSites\Pages;

use App\Enums\SettingSiteTypeEnum;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Setting\SettingSites\SettingSiteResource;

class CreateSettingSite extends CreateRecord
{
    protected static string $resource = SettingSiteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        if ($data['type'] === SettingSiteTypeEnum::Text->value) :
            $data['description'] = $data['description_text'] ?? null;
        endif;
        if ($data['type'] === SettingSiteTypeEnum::File->value):
            $data['description'] = is_array($data['description_file'])
                ? ($data['description_file'][0] ?? null)
                : $data['description_file'];
        endif;
        unset($data['description_text'], $data['description_file']);
        return $data;
    }
}
