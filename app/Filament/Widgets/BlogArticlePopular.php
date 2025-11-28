<?php

namespace App\Filament\Widgets;

use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use Filament\Widgets\TableWidget;
use App\Models\Post\BlogArticleCounter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class BlogArticlePopular extends TableWidget
{

    protected static ?string $heading = 'Artikel Populer';
    protected int | string | array $columnSpan = 'full';
    protected static string $color = 'info';
    protected static bool $isLazy = true;
    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn(): Builder =>
                BlogArticle::query()
                    ->with('counter')
                    ->orderByDesc(
                        BlogArticleCounter::select('visitor')
                            ->whereColumn('blog_article_counters.blog_article_id', 'blog_articles.id')
                            ->limit(1)
                    )
            )
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
