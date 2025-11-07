<?php

namespace App\Filament\Resources\Feature\People\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;

class PeopleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make(Str::headline(__('rincian')))
                    ->collapsible()
                    ->columnSpan(2)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        TextInput::make('order')
                            ->label(Str::title(__('urutan')))
                            ->required()
                            ->numeric()
                            ->default(1),
                        Select::make('people_position_id')
                            ->label(Str::title(__('jabatan')))
                            ->required()
                            ->forceSearchCaseInsensitive()
                            ->searchable()
                            ->preload()
                            ->relationship(
                                name: 'position',
                                titleAttribute: 'title',
                                modifyQueryUsing: fn(Builder $query) => $query
                                    ->orderBy('title')
                                    ->where('is_show', true)
                            ),
                        TextInput::make('name')
                            ->label(Str::title(__('nama')))
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('description')
                            ->label(Str::title(__('deskripsi')))

                    ]),
                Section::make(Str::headline(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('max: 10 MB.')))
                            ->directory('people-file/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1'])
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
