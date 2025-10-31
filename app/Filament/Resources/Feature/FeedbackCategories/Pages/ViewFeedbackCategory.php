<?php

namespace App\Filament\Resources\Feature\FeedbackCategories\Pages;

use App\Filament\Resources\Feature\FeedbackCategories\FeedbackCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedbackCategory extends ViewRecord
{
    protected static string $resource = FeedbackCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
