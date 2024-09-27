<?php

namespace App\Filament\Resources\Media\CarouselResource\Pages;

use App\Filament\Resources\Media\CarouselResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCarousel extends ViewRecord
{
    protected static string $resource = CarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
