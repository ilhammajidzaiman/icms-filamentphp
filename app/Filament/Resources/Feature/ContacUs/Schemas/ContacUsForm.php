<?php

namespace App\Filament\Resources\Feature\ContacUs\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class ContacUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(Str::title(__('rincian')))
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        TextInput::make('name')
                            ->label(Str::title(__('nama')))
                            ->maxLength(1024),
                        TextInput::make('email')
                            ->label(Str::title(__('email')))
                            ->maxLength(1024),
                        TextInput::make('subject')
                            ->label(Str::title(__('subjek')))
                            ->maxLength(1024),
                        Textarea::make('message')
                            ->label(Str::title(__('pesan')))
                            ->autosize()
                            ->maxLength(1024),
                    ]),
            ]);
    }
}
