<?php

namespace App\Filament\Resources\FileBlogCategoryResource\Pages;

use App\Filament\Resources\FileBlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFileBlogCategory extends CreateRecord
{
    protected static string $resource = FileBlogCategoryResource::class;

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
