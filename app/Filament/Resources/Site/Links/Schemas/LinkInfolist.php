<?php

namespace App\Filament\Resources\Site\Links\Schemas;

use App\Models\Site\Link;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LinkInfolist
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
                    ->visible(fn (Link $record): bool => $record->trashed()),
                TextEntry::make('uuid')
                    ->label('UUID')
                    ->placeholder('-'),
                IconEntry::make('is_show')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('slug')
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('url')
                    ->placeholder('-'),
            ]);
    }
}
