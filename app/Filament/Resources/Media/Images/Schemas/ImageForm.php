<?php

namespace App\Filament\Resources\Media\Images\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;

class ImageForm
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
                        Textarea::make('description')
                            ->label(Str::title(__('deskripsi')))
                            ->autosize()
                            ->maxLength(1024),
                    ]),
                Section::make(Str::title(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('sampul')))
                            ->helperText(Str::title(__('max: 10 MB.')))
                            ->directory('image-file/' . date('Y/m'))
                            // ->optimize('webp')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                        FileUpload::make('attachment')
                            ->label(Str::title(__('lampiran')))
                            ->helperText(Str::title(__('max: 10 MB. max file: 5 File.')))
                            ->directory('image-attachment/' . date('Y/m'))
                            // ->optimize('webp')
                            ->required()
                            ->image()
                            ->openable()
                            ->downloadable()
                            ->imageEditor()
                            ->multiple()
                            ->maxFiles(20)
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
