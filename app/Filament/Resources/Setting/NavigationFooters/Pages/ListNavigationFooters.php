<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Setting\NavigationFooters\NavigationFooterResource;
use App\Filament\Resources\Setting\NavigationFooters\Widgets\FilamentTreeWidget;

class ListNavigationFooters extends ListRecords
{
    protected static string $resource = NavigationFooterResource::class;

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
