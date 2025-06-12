<?php

namespace App\Filament\Resources\Feature\ContacUsResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use App\Services\Infolist\ViewInfolistService;
use App\Filament\Resources\Feature\ContacUsResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewContacUs extends ViewRecord
{
    protected static string $resource = ContacUsResource::class;

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
                                TextEntry::make('name')
                                    ->label(Str::headline(__('nama')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('email')
                                    ->label(Str::headline(__('email')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('subject')
                                    ->label(Str::headline(__('subjek')))
                                    ->size(TextEntrySize::Large)
                                    ->color('secondary'),
                                TextEntry::make('message')
                                    ->label(Str::headline(__('pesan')))
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
