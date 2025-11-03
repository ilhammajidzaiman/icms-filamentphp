<?php

namespace App\Filament\Resources\Feature\Feedback\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;

class FeedbackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(Str::headline(__('rincian')))
                    ->collapsible()
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->default(true),
                        Select::make('feedback_category_id')
                            ->label(Str::headline(__('kategori')))
                            ->required()
                            ->forceSearchCaseInsensitive()
                            ->searchable()
                            ->preload()
                            ->relationship(
                                name: 'feedbackCategory',
                                titleAttribute: 'title',
                                modifyQueryUsing: fn(Builder $query) => $query
                                    ->orderBy('title')
                                    ->where('is_show', true)
                            ),
                        TextInput::make('name')
                            ->label(Str::headline(__('nama')))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(Str::headline(__('email')))
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Textarea::make('message')
                            ->label(Str::headline(__('pesan')))
                            ->required()
                            ->autosize(),
                    ]),
            ]);
    }
}
