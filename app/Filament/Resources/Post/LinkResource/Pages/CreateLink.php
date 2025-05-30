<?php

namespace App\Filament\Resources\Post\LinkResource\Pages;

use App\Filament\Resources\Post\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;

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
