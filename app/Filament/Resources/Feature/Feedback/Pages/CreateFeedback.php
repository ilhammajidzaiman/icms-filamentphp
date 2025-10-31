<?php

namespace App\Filament\Resources\Feature\Feedback\Pages;

use App\Filament\Resources\Feature\Feedback\FeedbackResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    protected static string $resource = FeedbackResource::class;
}
