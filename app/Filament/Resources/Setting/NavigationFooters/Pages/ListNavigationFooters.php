<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Pages;

use App\Filament\Resources\Setting\NavigationFooters\NavigationFooterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNavigationFooters extends ListRecords
{
    protected static string $resource = NavigationFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
