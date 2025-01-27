<?php

namespace App\Filament\Resources\Media\FileCategoryResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Media\FileCategoryResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewFileCategory extends ViewRecord
{
    protected static string $resource = FileCategoryResource::class;

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
                Section::make('Informasi')
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->columnSpan(2)
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul')
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large),
                        TextEntry::make('slug')
                            ->label('Slug')
                            ->color('gray'),
                    ]),
                Section::make('Rincian')
                    ->icon('heroicon-o-bars-3')
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        TextEntry::make('uuid')
                            ->label('UUID'),
                        IconEntry::make('is_show')
                            ->label('Tampil')
                            ->boolean(),
                        TextEntry::make('user.name')
                            ->label('Dibuat Oleh')
                            ->badge(),
                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->date('l, d F Y'),
                        TextEntry::make('updated_at')
                            ->label('Diubah Pada')
                            ->date('l, d F Y'),
                        TextEntry::make('deleted_at')
                            ->label('Dihapus Pada')
                            ->date('l, d F Y'),
                    ])
            ]);
    }
}
