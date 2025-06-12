<?php

namespace App\Filament\Resources\Media\FileResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\Media\FileResource;
use App\Services\Infolist\ViewInfolistService;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewFile extends ViewRecord
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make(Str::headline(__('details')))
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                ImageEntry::make('file')
                                    ->label(Str::headline(__('gambar')))
                                    ->defaultImageUrl(asset('/image/default-img.svg')),
                                TextEntry::make('attachment')
                                    ->label(Str::headline(__('lampiran')))
                                    ->columnSpanFull(),
                                TextEntry::make('title')
                                    ->label(Str::headline(__('judul')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('slug')
                                    ->label(Str::headline(__('slug')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary')
                                    ->copyable(),
                                TextEntry::make('fileCategory.title')
                                    ->label(Str::headline(__('kategori')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('downloader')
                                    ->label(Str::headline(__('download')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                            ]),
                        Tab::make(Str::headline(__('properties')))
                            ->icon('heroicon-o-information-circle')
                            ->schema(ViewInfolistService::schema()),
                    ]),
            ]);
    }
}
