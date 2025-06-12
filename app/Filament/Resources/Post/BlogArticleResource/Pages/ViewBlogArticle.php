<?php

namespace App\Filament\Resources\Post\BlogArticleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Group;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Services\Infolist\ViewInfolistService;
use App\Filament\Resources\Post\BlogArticleResource;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

class ViewBlogArticle extends ViewRecord
{
    protected static string $resource = BlogArticleResource::class;

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
                            ->columns(3)
                            ->schema([
                                Group::make()
                                    ->columnSpan(2)
                                    ->schema([
                                        ImageEntry::make('file')
                                            ->label(Str::headline(__('gambar')))
                                            ->defaultImageUrl(asset('/image/default-img.svg')),
                                        TextEntry::make('description')
                                            ->label(Str::headline(__('description')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        ImageEntry::make('attachment')
                                            ->label(Str::headline(__('lampiran gambar')))
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
                                        TextEntry::make('content')
                                            ->label(Str::headline(__('konten')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->html(),
                                    ]),
                                Group::make()
                                    ->columnSpan(1)
                                    ->schema([
                                        IconEntry::make('is_show')
                                            ->label(Str::headline(__('status'))),
                                        TextEntry::make('visitor')
                                            ->label(Str::headline(__('pengunjung')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        TextEntry::make('blogCategory.title')
                                            ->label(Str::headline(__('kategori')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                        TextEntry::make('blogTags.title')
                                            ->label(Str::headline(__('tag')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->badge(),
                                        TextEntry::make('published_at')
                                            ->label(Str::headline(__('dirilis')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary')
                                            ->dateTime('l, j F Y H:i:s'),
                                        TextEntry::make('user.name')
                                            ->label(Str::headline(__('penulis')))
                                            ->size(TextEntrySize::Large)
                                            ->color('secondary'),
                                    ]),
                            ]),
                        Tab::make(Str::headline(__('properties')))
                            ->icon('heroicon-o-information-circle')
                            ->schema(ViewInfolistService::schema()),
                    ]),
            ]);
    }
}
