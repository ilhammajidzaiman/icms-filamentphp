<?php

namespace App\Filament\Resources\Feature\PeopleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Services\Infolist\ViewInfolistService;
use App\Filament\Resources\Feature\PeopleResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewPeople extends ViewRecord
{
    protected static string $resource = PeopleResource::class;

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
                                TextEntry::make('order')
                                    ->label(Str::headline(__('urutan')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('name')
                                    ->label(Str::headline(__('nama')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('peoplePosition.title')
                                    ->label(Str::headline(__('jabatan')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('description')
                                    ->label(Str::headline(__('deskripsi')))
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
