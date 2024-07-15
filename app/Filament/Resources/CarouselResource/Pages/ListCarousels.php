<?php

namespace App\Filament\Resources\CarouselResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CarouselResource;
use App\Filament\Resources\CarouselResource\Widgets\CarouselOverview;

class Listcarousels extends ListRecords
{
    protected static string $resource = CarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CarouselOverview::class,
        ];
    }
}
