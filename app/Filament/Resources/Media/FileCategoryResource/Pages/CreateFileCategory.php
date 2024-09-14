<?php

namespace App\Filament\Resources\Media\FileCategoryResource\Pages;

use App\Filament\Resources\Media\FileCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileCategory extends CreateRecord
{
    protected static string $resource = FileCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }
}
