<?php

namespace App\Filament\Resources\Post\LinkResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Post\LinkResource;
use App\Services\Infolist\ViewInfolistService;
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
            ->schema([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make(Str::headline(__('details')))
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                TextEntry::make('title')
                                    ->label(Str::headline(__('judul')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('slug')
                                    ->label(Str::headline(__('slug')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary')
                                    ->copyable(),
                                TextEntry::make('url')
                                    ->label(Str::headline(__('url')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary')
                                    ->copyable(),
                            ]),
                        Tab::make(Str::headline(__('properties')))
                            ->icon('heroicon-o-information-circle')
                            ->schema(ViewInfolistService::schema()),
                    ]),
            ]);
    }
}
