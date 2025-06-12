<?php

namespace App\Filament\Resources\Feature\PeoplePositionResource\Pages;

use App\Filament\Resources\Feature\PeoplePositionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeoplePosition extends EditRecord
{
    protected static string $resource = PeoplePositionResource::class;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
