<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NavigationFooterForm
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
                TextInput::make('parent_id')
                    ->numeric()
                    ->default(-1),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                TextInput::make('modelable_type')
                    ->required(),
                TextInput::make('modelable_id')
                    ->required()
                    ->numeric(),
                TextInput::make('slug'),
                TextInput::make('title'),
            ]);
    }
}
