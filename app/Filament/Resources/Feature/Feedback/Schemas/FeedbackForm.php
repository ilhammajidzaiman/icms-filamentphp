<?php

namespace App\Filament\Resources\Feature\Feedback\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FeedbackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID'),
                Toggle::make('is_show')
                    ->required(),
                Select::make('feedback_category_id')
                    ->relationship('feedbackCategory', 'title'),
                TextInput::make('name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Textarea::make('message')
                    ->columnSpanFull(),
            ]);
    }
}
