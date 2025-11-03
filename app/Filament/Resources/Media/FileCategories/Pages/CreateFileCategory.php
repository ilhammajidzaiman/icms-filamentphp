<?php

namespace App\Filament\Resources\Media\FileCategories\Pages;

use App\Filament\Resources\Media\FileCategories\FileCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFileCategory extends CreateRecord
{
    protected static string $resource = FileCategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
