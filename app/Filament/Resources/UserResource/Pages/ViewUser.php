<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
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
            ->columns(3)
            ->schema([
                Section::make()
                    ->columnSpan(2)
                    ->schema([
                        ImageEntry::make('profile.file')
                            ->hiddenlabel('Gambar')
                            ->defaultImageUrl(asset('/image/default-img.svg')),
                        TextEntry::make('roles.name')
                            ->label('Peran')
                            ->badge()
                            ->separator(',')
                            ->size(TextEntrySize::Large),
                        TextEntry::make('name')
                            ->label('Nama')
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large),
                        TextEntry::make('username')
                            ->label('Username'),
                        TextEntry::make('email')
                            ->label('Email'),
                        TextEntry::make('profile.gender')
                            ->label('Jenis Kelamin'),
                        TextEntry::make('profile.birth_date')
                            ->label('Tanggal Lahir')
                            ->date('d F Y'),
                        TextEntry::make('profile.birth_date')
                            ->label('Umur')
                            ->since(),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->since(),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui')
                            ->since(),
                        TextEntry::make('deleted_at')
                            ->label('Dihapus')
                            ->since(),
                    ])
            ]);
    }
}
