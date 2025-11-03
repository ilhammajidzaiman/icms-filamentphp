<?php

namespace App\Filament\Resources\Setting\SettingSites\Pages;

use Filament\Actions\ViewAction;
use App\Enums\SettingSiteTypeEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Setting\SettingSites\SettingSiteResource;

class EditSettingSite extends EditRecord
{
    protected static string $resource = SettingSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data['type'] === SettingSiteTypeEnum::Text->value) :
            $data['description_text'] = $data['description'];
        endif;
        if ($data['type'] === SettingSiteTypeEnum::File->value && !empty($data['description'])) :
            $data['description_file'] = [$data['description']];
        endif;
        return $data;
    }
}
