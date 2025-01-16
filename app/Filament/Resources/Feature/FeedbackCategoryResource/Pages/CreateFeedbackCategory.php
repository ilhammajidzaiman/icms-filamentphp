<?php

namespace App\Filament\Resources\Feature\FeedbackCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Feature\FeedbackCategoryResource;

class CreateFeedbackCategory extends CreateRecord
{
    protected static string $resource = FeedbackCategoryResource::class;

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
