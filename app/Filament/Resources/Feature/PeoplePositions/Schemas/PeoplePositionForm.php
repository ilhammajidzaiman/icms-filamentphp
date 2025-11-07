<?php

namespace App\Filament\Resources\Feature\PeoplePositions\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

class PeoplePositionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(Str::title(__('form')))
                    ->columnSpanFull()
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        TextInput::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::title(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                    ]),
            ]);
    }
}
