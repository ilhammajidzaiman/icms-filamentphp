<?php

namespace App\Filament\Resources\Media\Carousels\Pages;

use App\Filament\Resources\Media\Carousels\CarouselResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarousel extends ViewRecord
{
    protected static string $resource = CarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
