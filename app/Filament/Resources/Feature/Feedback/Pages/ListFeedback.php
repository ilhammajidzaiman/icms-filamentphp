<?php

namespace App\Filament\Resources\Feature\Feedback\Pages;

use App\Filament\Resources\Feature\Feedback\FeedbackResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeedback extends ListRecords
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
