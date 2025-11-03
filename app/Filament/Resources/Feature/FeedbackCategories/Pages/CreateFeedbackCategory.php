<?php

namespace App\Filament\Resources\Feature\FeedbackCategories\Pages;

use App\Filament\Resources\Feature\FeedbackCategories\FeedbackCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedbackCategory extends CreateRecord
{
    protected static string $resource = FeedbackCategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
