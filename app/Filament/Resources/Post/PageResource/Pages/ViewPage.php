<?php

namespace App\Filament\Resources\Post\PageResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\Post\PageResource;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewPage extends ViewRecord
{
    protected static string $resource = PageResource::class;

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
                        ImageEntry::make('file')
                            ->hiddenlabel(Str::headline(__('gambar')))
                            ->defaultImageUrl(asset('/image/default-img.svg')),
                        TextEntry::make('title')
                            ->label(Str::headline(__('judul')))
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large),
                        TextEntry::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->color('gray'),
                        TextEntry::make('content')
                            ->label(Str::headline(__('konten')))
                            ->html(),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        IconEntry::make('is_show')
                            ->label(Str::headline(__('status'))),
                        TextEntry::make('user.name')
                            ->label(Str::headline(__('penulis')))
                            ->badge(),
                        TextEntry::make('created_at')
                            ->label(Str::headline(__('dibuat')))
                            ->since(),
                        TextEntry::make('updated_at')
                            ->label(Str::headline(__('diperbarui')))
                            ->since(),
                    ])
            ]);
    }
}
