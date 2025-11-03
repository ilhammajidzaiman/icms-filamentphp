<?php

namespace App\Filament\Resources\Setting\NavigationMenus\Pages;

use App\Filament\Resources\Setting\NavigationMenus\NavigationMenuResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNavigationMenu extends CreateRecord
{
    protected static string $resource = NavigationMenuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
