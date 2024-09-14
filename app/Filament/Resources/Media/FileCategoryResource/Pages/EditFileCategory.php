<?php

namespace App\Filament\Resources\Media\FileCategoryResource\Pages;

use App\Filament\Resources\Media\FileCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFileCategory extends EditRecord
{
    protected static string $resource = FileCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
