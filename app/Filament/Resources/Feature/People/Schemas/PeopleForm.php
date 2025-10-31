<?php

namespace App\Filament\Resources\Feature\People\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PeopleForm
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
                Select::make('people_position_id')
                    ->relationship('peoplePosition', 'title'),
                TextInput::make('order')
                    ->numeric()
                    ->default(1),
                TextInput::make('name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('file'),
            ]);
    }
}
