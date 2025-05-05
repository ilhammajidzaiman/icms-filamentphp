<?php

namespace App\Filament\Resources\Post\LinkResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Post\LinkResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(3)
            ->schema([
                Section::make()
                    ->columnSpan(2)
                    ->schema([
                        TextEntry::make('title')
                            ->label(Str::headline(__('judul')))
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large)
                            ->color('primary'),
                        TextEntry::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->color('gray')
                            ->copyable(),
                        TextEntry::make('url')
                            ->label(Str::headline(__('judul')))
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large)
                            ->color('primary')
                            ->copyable(),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        IconEntry::make('is_show')
                            ->label(Str::headline(__('status'))),
                        TextEntry::make('user.name')
                            ->label(Str::headline(__('penulis')))
                            ->color('primary'),
                        TextEntry::make('created_at')
                            ->label(Str::headline(__('dibuat')))
                            ->dateTime('l, j F Y H:i:s'),
                        TextEntry::make('updated_at')
                            ->label(Str::headline(__('diperbarui')))
                            ->dateTime('l, j F Y H:i:s'),
                        TextEntry::make('uuid')
                            ->label(Str::headline(__('UUID')))
                            ->color('gray'),
                    ])
            ]);
    }
}
