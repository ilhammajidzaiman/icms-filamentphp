<?php

namespace App\Filament\Resources\Setting\SettingSites\Schemas;

use App\Enums\SettingSiteTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SettingSiteForm
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
                TextInput::make('title'),
                TextInput::make('file'),
                Select::make('type')
                    ->options(SettingSiteTypeEnum::class),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
