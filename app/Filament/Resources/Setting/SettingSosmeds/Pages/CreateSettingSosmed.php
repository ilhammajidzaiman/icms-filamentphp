<?php

namespace App\Filament\Resources\Setting\SettingSosmeds\Pages;

use App\Enums\SettingSiteTypeEnum;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Setting\SettingSosmeds\SettingSosmedResource;

class CreateSettingSosmed extends CreateRecord
{
    protected static string $resource = SettingSosmedResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        if ($data['type'] === SettingSiteTypeEnum::Text->value) :
            $data['file'] = $data['file_text'] ?? null;
        endif;
        if ($data['type'] === SettingSiteTypeEnum::File->value):
            $data['file'] = is_array($data['file_file'])
                ? ($data['file_file'][0] ?? null)
                : $data['file_file'];
        endif;
        unset($data['file_text'], $data['file_file']);
        return $data;
    }
}
