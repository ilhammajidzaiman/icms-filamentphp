<?php

namespace App\Services\Infolist;

use Illuminate\Support\Str;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewInfolistService
{
    public static function schema(): array
    {
        return [
            IconEntry::make('is_show')
                ->label(Str::headline(__('status'))),
            TextEntry::make('user.name')
                ->label(Str::headline(__('penulis')))
                ->size(TextEntrySize::Large)
                ->color('secondary')
                ->default('-'),
            TextEntry::make('uuid')
                ->label(Str::headline(__('UUID')))
                ->size(TextEntrySize::Large)
                ->color('secondary')
                ->default('-'),
            TextEntry::make('created_at')
                ->label(Str::headline(__('dibuat')))
                ->size(TextEntrySize::Large)
                ->color('secondary')
                ->dateTime('l, j F Y H:i:s'),
            TextEntry::make('updated_at')
                ->label(Str::headline(__('diperbarui')))
                ->size(TextEntrySize::Large)
                ->color('secondary')
                ->dateTime('l, j F Y H:i:s'),
            TextEntry::make('deleted_at')
                ->label(Str::headline(__('dihapus')))
                ->size(TextEntrySize::Large)
                ->color('secondary')
                ->dateTime('l, j F Y H:i:s'),
        ];
    }
}
