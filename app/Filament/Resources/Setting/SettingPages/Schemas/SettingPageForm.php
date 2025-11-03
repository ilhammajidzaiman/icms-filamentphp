<?php

namespace App\Filament\Resources\Setting\SettingPages\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Enums\SettingPageOptionEnum;
use App\Enums\SettingPageSectionEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class SettingPageForm
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
                        Select::make('section')
                            ->label(Str::title(__('section')))
                            ->required()
                            ->native(false)
                            ->options(SettingPageSectionEnum::class),
                        Select::make('option')
                            ->label(Str::title(__('option')))
                            ->required()
                            ->native(false)
                            ->options(SettingPageOptionEnum::class),
                    ]),
            ]);
    }
}
