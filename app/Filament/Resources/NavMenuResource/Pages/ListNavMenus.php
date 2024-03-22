<?php

namespace App\Filament\Resources\NavMenuResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NavMenuResource;
use App\Filament\Resources\NavMenuResource\Widgets\NavMenuWidget;

class ListNavMenus extends ListRecords
{
    protected static string $resource = NavMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            NavMenuWidget::class
        ];
    }
}
