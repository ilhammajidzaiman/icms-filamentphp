<?php

namespace App\Filament\Resources\Media\Files\Schemas;

use App\Models\Media\File;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FileInfolist
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
                    ->visible(fn (File $record): bool => $record->trashed()),
                TextEntry::make('uuid')
                    ->label('UUID')
                    ->placeholder('-'),
                IconEntry::make('is_show')
                    ->boolean(),
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('fileCategory.title')
                    ->label('File category')
                    ->placeholder('-'),
                TextEntry::make('slug')
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('downloader')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('file')
                    ->placeholder('-'),
                TextEntry::make('attachment')
                    ->placeholder('-'),
            ]);
    }
}
