<?php

namespace App\Filament\Resources\Site\Links\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LinkForm
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
                TextInput::make('slug'),
                TextInput::make('title'),
                TextInput::make('url')
                    ->url(),
            ]);
    }
}
