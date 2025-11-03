<?php

namespace App\Filament\Resources\Setting\SettingSosmeds\Pages;

use Filament\Actions\ViewAction;
use App\Enums\SettingSiteTypeEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Setting\SettingSosmeds\SettingSosmedResource;

class EditSettingSosmed extends EditRecord
{
    protected static string $resource = SettingSosmedResource::class;

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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data['type'] === SettingSiteTypeEnum::Text->value) :
            $data['file_text'] = $data['file'];
        endif;
        if ($data['type'] === SettingSiteTypeEnum::File->value && !empty($data['file'])) :
            $data['file_file'] = [$data['file']];
        endif;
        return $data;
    }
}
