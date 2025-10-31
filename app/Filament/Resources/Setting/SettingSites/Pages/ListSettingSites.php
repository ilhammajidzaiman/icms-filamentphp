<?php

namespace App\Filament\Resources\Setting\SettingSites\Pages;

use App\Filament\Resources\Setting\SettingSites\SettingSiteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettingSites extends ListRecords
{
    protected static string $resource = SettingSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
