<?php

namespace App\Filament\Resources\Media\Information\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Set;

class InformationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make(Str::title(__('form')))
                    ->collapsible()
                    ->columnSpan(2)
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
                        RichEditor::make('content')
                            ->label(Str::title(__('konten')))
                            ->required(),
                    ]),
                Section::make(Str::title(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('max: 10 MB.')))
                            ->directory('information-file/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
