<?php

namespace App\Filament\Resources\Feature\FeedbackCategoryResource\Pages;

use Filament\Actions;

use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use App\Filament\Resources\Feature\FeedbackCategoryResource;

class ViewFeedbackCategory extends ViewRecord
{
    protected static string $resource = FeedbackCategoryResource::class;

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
                            ->label('Judul')
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large),
                        TextEntry::make('slug')
                            ->label('Slug')
                            ->color('secondary'),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        IconEntry::make('is_show')
                            ->label('Status')
                            ->boolean(),
                        TextEntry::make('user.name')
                            ->label('Penulis')
                            ->badge(),
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
