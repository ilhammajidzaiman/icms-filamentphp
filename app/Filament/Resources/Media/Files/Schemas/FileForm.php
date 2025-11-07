<?php

namespace App\Filament\Resources\Media\Files\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Schemas\Components\Utilities\Set;

class FileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make(Str::title(__('form')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        Select::make('file_category_id')
                            ->label(Str::title(__('kategori')))
                            ->required()
                            ->forceSearchCaseInsensitive()
                            ->searchable()
                            ->preload()
                            ->relationship(
                                name: 'category',
                                titleAttribute: 'title',
                                modifyQueryUsing: fn(Builder $query) => $query
                                    ->orderBy('title')
                                    ->where('is_show', true)
                            ),
                        TextInput::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::title(__('slug')))
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                    ]),
                Section::make(Str::title(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('sampul')))
                            ->helperText(Str::title(__('max: 10 mb.')))
                            ->directory('file-file/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                        FileUpload::make('attachment')
                            ->label(Str::title(__('lampiran')))
                            ->helperText(Str::title(__('max: 10 mb. ext: pdf, doc, xls, ppt, jpg, png, svg, zip, rar.')))
                            ->directory('file-attachment/' . date('Y/m'))
                            ->required()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
