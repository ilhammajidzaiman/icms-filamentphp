<?php

namespace App\Filament\Resources\Media\Files\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FileForm
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
                Select::make('file_category_id')
                    ->relationship('fileCategory', 'title'),
                TextInput::make('slug'),
                TextInput::make('title'),
                TextInput::make('downloader')
                    ->numeric()
                    ->default(0),
                TextInput::make('file'),
                TextInput::make('attachment'),
            ]);
    }
}
