<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Pages;

use App\Filament\Resources\Setting\NavigationFooters\NavigationFooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNavigationFooter extends CreateRecord
{
    protected static string $resource = NavigationFooterResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
