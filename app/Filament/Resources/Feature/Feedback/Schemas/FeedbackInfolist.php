<?php

namespace App\Filament\Resources\Feature\Feedback\Schemas;

use App\Models\Feature\Feedback;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FeedbackInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Feedback $record): bool => $record->trashed()),
                TextEntry::make('uuid')
                    ->label('UUID')
                    ->placeholder('-'),
                IconEntry::make('is_show')
                    ->boolean(),
                TextEntry::make('feedbackCategory.title')
                    ->label('Feedback category')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ]);
    }
}
