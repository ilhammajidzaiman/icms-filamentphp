<?php

namespace App\Filament\Resources\Media\CarouselResource\Pages;

use App\Filament\Resources\Media\CarouselResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCarousel extends CreateRecord
{
    protected static string $resource = CarouselResource::class;

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
