<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use App\Filament\Resources\UserResource;
use Filament\Infolists\Components\Group;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Services\Infolist\ViewInfolistService;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

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
                            ->columns(2)
                            ->schema([
                                Group::make()
                                    ->columnSpan(1)
                                    ->schema([
                                        ImageEntry::make('profile.file')
                                            ->hiddenlabel(Str::headline(__('gambar')))
                                            ->defaultImageUrl(asset('/image/default-img.svg')),
                                        TextEntry::make('roles.name')
                                            ->label(Str::headline(__('peran')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        TextEntry::make('username')
                                            ->label(Str::headline(__('username')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        TextEntry::make('email')
                                            ->label(Str::headline(__('email')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                    ]),
                                Group::make()
                                    ->columnSpan(1)
                                    ->schema([
                                        TextEntry::make('name')
                                            ->label(Str::headline(__('nama')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        TextEntry::make('profile.gender')
                                            ->label(Str::headline(__('jenis kelamin')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->default('-'),
                                        TextEntry::make('profile.birth_date')
                                            ->label(Str::headline(__('tanggal lahir')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->date('d F Y'),
                                        TextEntry::make('profile.birth_date')
                                            ->label(Str::headline(__('umur')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->since(),
                                    ]),
                            ]),
                        Tab::make(Str::headline(__('properties')))
                            ->icon('heroicon-o-information-circle')
                            ->schema(ViewInfolistService::schema()),
                    ]),
            ]);
    }
}
