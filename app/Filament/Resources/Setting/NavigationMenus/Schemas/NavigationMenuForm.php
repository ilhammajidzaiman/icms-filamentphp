<?php

namespace App\Filament\Resources\Setting\NavigationMenus\Schemas;

use Filament\Schemas\Schema;
use App\Services\Filament\Form\FilamentTreeFormService;

class NavigationMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FilamentTreeFormService::schema());
    }
}
