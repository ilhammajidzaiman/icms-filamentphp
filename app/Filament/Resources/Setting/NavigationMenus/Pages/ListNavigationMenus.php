<?php

namespace App\Filament\Resources\Setting\NavigationMenus\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Setting\NavigationMenus\NavigationMenuResource;
use App\Filament\Resources\Setting\NavigationMenus\Widgets\FilamentTreeWidget;

class ListNavigationMenus extends ListRecords
{
    protected static string $resource = NavigationMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [FilamentTreeWidget::class];
    }
}
