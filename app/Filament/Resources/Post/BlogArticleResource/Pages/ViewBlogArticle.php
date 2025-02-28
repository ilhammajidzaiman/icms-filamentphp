<?php

namespace App\Filament\Resources\Post\BlogArticleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
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
            ->columns(3)
            ->schema([
                Section::make()
                    ->columnSpan(2)
                    ->schema([
                        ImageEntry::make('file')
                            ->hiddenlabel(Str::headline(__('gambar')))
                            ->defaultImageUrl(asset('/image/default-img.svg')),
                        ImageEntry::make('attachment')
                            ->hiddenlabel(Str::headline(__('lampiran gambar')))
                            ->columnSpanFull(),
                        TextEntry::make('title')
                            ->label(Str::headline(__('judul')))
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large)
                            ->color('primary'),
                        TextEntry::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->color('gray'),
                        TextEntry::make('blogCategory.title')
                            ->label(Str::headline(__('kategori')))
                            ->color('primary'),
                        TextEntry::make('blogTags.title')
                            ->label(Str::headline(__('tag')))
                            ->badge()
                            ->color('primary'),
                        TextEntry::make('content')
                            ->label(Str::headline(__('konten')))
                            ->html(),
                    ]),
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        IconEntry::make('is_show')
                            ->label(Str::headline(__('status'))),
                        TextEntry::make('visitor')
                            ->label(Str::headline(__('pengunjung')))
                            ->color('primary'),
                        TextEntry::make('user.name')
                            ->label(Str::headline(__('penulis')))
                            ->color('primary'),
                        TextEntry::make('published_at')
                            ->label(Str::headline(__('dirilis')))
                            ->dateTime('l, j F Y H:i:s'),
                        TextEntry::make('created_at')
                            ->label(Str::headline(__('dibuat')))
                            ->dateTime('l, j F Y H:i:s'),
                        TextEntry::make('updated_at')
                            ->label(Str::headline(__('diperbarui')))
                            ->dateTime('l, j F Y H:i:s'),
                        TextEntry::make('uuid')
                            ->label(Str::headline(__('UUID')))
                            ->color('gray'),
                    ])
            ]);
    }
}
