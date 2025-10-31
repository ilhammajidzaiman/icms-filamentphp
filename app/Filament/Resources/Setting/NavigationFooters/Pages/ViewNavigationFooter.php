<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Pages;

use App\Filament\Resources\Setting\NavigationFooters\NavigationFooterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNavigationFooter extends ViewRecord
{
    protected static string $resource = NavigationFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
