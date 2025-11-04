<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Schemas;

use Filament\Schemas\Schema;
use App\Services\Filament\Form\FilamentTreeFormService;

class NavigationFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FilamentTreeFormService::schema());
    }
}
