<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Pages;

use App\Filament\Resources\Setting\NavigationFooters\NavigationFooterResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNavigationFooter extends EditRecord
{
    protected static string $resource = NavigationFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
