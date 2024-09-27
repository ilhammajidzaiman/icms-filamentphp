<?php

namespace App\Filament\Resources\Post\LinkResource\Pages;

use App\Filament\Resources\Post\LinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
