<?php

namespace App\Filament\Resources\ContacUsResource\Pages;

use App\Filament\Resources\ContacUsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContacUs extends EditRecord
{
    protected static string $resource = ContacUsResource::class;

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
