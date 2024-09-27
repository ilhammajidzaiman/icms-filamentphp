<?php

namespace App\Filament\Resources\Feature\FeedbackResource\Pages;

use App\Filament\Resources\Feature\FeedbackResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedback extends ViewRecord
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
