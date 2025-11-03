<?php

namespace App\Filament\Resources\Media\Videos\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

class VideoForm
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
                            ->label(Str::title(__('status')))
                            ->default(true),
                        Textarea::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->autosize()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::title(__('slug')))
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        Textarea::make('url')
                            ->label(Str::title(__('url/link video youtube')))
                            ->required()
                            ->autosize()
                            ->maxLength(1024),
                        Textarea::make('embed')
                            ->label(Str::title(__('embed video youtube')))
                            ->required()
                            ->autosize()
                            ->maxLength(1024),
                    ]),
            ]);
    }
}
