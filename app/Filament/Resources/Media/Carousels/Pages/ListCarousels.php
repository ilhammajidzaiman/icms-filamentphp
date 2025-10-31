<?php

namespace App\Filament\Resources\Media\Carousels\Pages;

use App\Filament\Resources\Media\Carousels\CarouselResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarousels extends ListRecords
{
    protected static string $resource = CarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
