<?php

namespace App\Filament\Resources\Post\NavMenuResource\Pages;

use App\Filament\Resources\Post\NavMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNavMenu extends ViewRecord
{
    protected static string $resource = NavMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
