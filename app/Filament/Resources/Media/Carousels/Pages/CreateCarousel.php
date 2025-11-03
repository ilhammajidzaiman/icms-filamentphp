<?php

namespace App\Filament\Resources\Media\Carousels\Pages;

use App\Filament\Resources\Media\Carousels\CarouselResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCarousel extends CreateRecord
{
    protected static string $resource = CarouselResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
