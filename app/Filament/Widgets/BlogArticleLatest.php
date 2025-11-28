<?php

namespace App\Filament\Widgets;

use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class BlogArticleLatest extends BaseWidget
{
    protected static ?string $heading = 'Artikel Terbaru';
    protected int | string | array $columnSpan = 'full';
    protected static string $color = 'info';
    protected static bool $isLazy = true;
    protected static ?int $sort = 5;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => BlogArticle::query())
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::title(__('no.')))
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label(Str::title(__('file')))
                    ->defaultImageUrl(asset('/images/default-img.svg'))
                    ->circular(),
                TextColumn::make('title')
                    ->label(Str::title(__('judul')))
                    ->wrap(),
                TextColumn::make('category.title')
                    ->label(Str::title(__('kategori')))
                    ->wrap(),
                TextColumn::make('counter.visitor')
                    ->label(Str::title(__('pengunjung')))
                    ->wrap(),
                TextColumn::make('published_at')
                    ->label(Str::title(__('diterbitkan ')))
                    ->since(),
            ]);
    }
}
