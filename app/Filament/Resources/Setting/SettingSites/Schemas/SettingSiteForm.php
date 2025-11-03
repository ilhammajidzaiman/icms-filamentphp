<?php

namespace App\Filament\Resources\Setting\SettingSites\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Enums\SettingSiteTypeEnum;
use App\Enums\SettingSiteOptionEnum;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Get;

class SettingSiteForm
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
                            ->required()
                            ->default(true),
                        Select::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->native(false)
                            ->options(SettingSiteOptionEnum::class),
                        Radio::make('type')
                            ->label(Str::title(__('tipe')))
                            // ->options(SettingSiteTypeEnum::class)
                            ->options([
                                SettingSiteTypeEnum::Text->value => 'text',
                                SettingSiteTypeEnum::File->value => 'file',
                            ])
                            ->default(SettingSiteTypeEnum::Text->value)
                            ->live()
                            ->inline()
                            ->inlineLabel(false),
                        Textarea::make('description_text')
                            ->label(Str::title(__('text')))
                            ->visible(fn(Get $get): bool => $get('type') === SettingSiteTypeEnum::Text->value)
                            ->autosize(),
                        FileUpload::make('description_file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('max: 10 mb.')))
                            ->visible(fn(Get $get): bool => $get('type') === SettingSiteTypeEnum::File->value)
                            ->directory('setting-site/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->openable()
                            ->downloadable()
                            ->imageEditor()
                            ->maxSize(51200),
                    ]),
            ]);
    }
}
