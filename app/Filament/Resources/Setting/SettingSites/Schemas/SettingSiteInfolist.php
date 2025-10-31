<?php

namespace App\Filament\Resources\Setting\SettingSites\Schemas;

use App\Models\Setting\SettingSite;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SettingSiteInfolist
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
                    ->visible(fn (SettingSite $record): bool => $record->trashed()),
                TextEntry::make('uuid')
                    ->label('UUID')
                    ->placeholder('-'),
                IconEntry::make('is_show')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('file')
                    ->placeholder('-'),
                TextEntry::make('type')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ]);
    }
}
