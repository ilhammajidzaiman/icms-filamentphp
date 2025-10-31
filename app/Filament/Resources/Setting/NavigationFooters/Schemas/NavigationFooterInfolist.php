<?php

namespace App\Filament\Resources\Setting\NavigationFooters\Schemas;

use App\Models\Setting\NavigationFooter;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NavigationFooterInfolist
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
                    ->visible(fn (NavigationFooter $record): bool => $record->trashed()),
                TextEntry::make('uuid')
                    ->label('UUID')
                    ->placeholder('-'),
                IconEntry::make('is_show')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('parent_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('order')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('modelable_type'),
                TextEntry::make('modelable_id')
                    ->numeric(),
                TextEntry::make('slug')
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->placeholder('-'),
            ]);
    }
}
