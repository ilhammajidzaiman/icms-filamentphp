<?php

namespace App\Filament\Resources\Media\InformationResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Services\Infolist\ViewInfolistService;
use App\Filament\Resources\Media\InformationResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewInformation extends ViewRecord
{
    protected static string $resource = InformationResource::class;

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
                                TextEntry::make('title')
                                    ->label(Str::headline(__('judul')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('slug')
                                    ->label(Str::headline(__('slug')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary')
                                    ->copyable(),
                                TextEntry::make('content')
                                    ->label(Str::headline(__('konten')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary')
                                    ->html(),
                            ]),
                        Tab::make(Str::headline(__('properties')))
                            ->icon('heroicon-o-information-circle')
                            ->schema(ViewInfolistService::schema()),
                    ]),
            ]);
    }
}
