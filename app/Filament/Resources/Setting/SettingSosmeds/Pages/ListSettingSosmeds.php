<?php

namespace App\Filament\Resources\Setting\SettingSosmeds\Pages;

use App\Filament\Resources\Setting\SettingSosmeds\SettingSosmedResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettingSosmeds extends ListRecords
{
    protected static string $resource = SettingSosmedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
