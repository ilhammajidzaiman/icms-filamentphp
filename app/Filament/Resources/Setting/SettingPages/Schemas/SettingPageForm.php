<?php

namespace App\Filament\Resources\Setting\SettingPages\Schemas;

use App\Enums\SettingPageOptionEnum;
use App\Enums\SettingPageSectionEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SettingPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID'),
                Toggle::make('is_show')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('section')
                    ->options(SettingPageSectionEnum::class),
                Select::make('option')
                    ->options(SettingPageOptionEnum::class),
            ]);
    }
}
