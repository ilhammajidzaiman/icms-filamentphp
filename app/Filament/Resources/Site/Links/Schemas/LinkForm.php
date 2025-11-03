<?php

namespace App\Filament\Resources\Site\Links\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

class LinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(Str::title(__('form')))
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_show')
                            ->label('Status')
                            ->default(true),
                        TextInput::make('title')
                            ->label(Str::headline(__('judul')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        Textarea::make('url')
                            ->label('Url')
                            ->required()
                            ->autosize(),
                    ])
            ]);
    }
}
