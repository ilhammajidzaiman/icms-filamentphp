<?php

namespace App\Filament\Widgets;

use Filament\Tables\Table;
use App\Models\BlogArticle;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class BlogArticlePopular extends BaseWidget
{
    use HasWidgetShield;

    protected static ?string $heading = 'Artikel Populer';
    protected int | string | array $columnSpan = 'full';
    protected static string $color = 'info';
    protected static bool $isLazy = true;
    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BlogArticle::orderByDesc('visitor')
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(isFromZero: false),
                TextColumn::make('title')
                    ->label('Judul')
                    ->wrap(),
                TextColumn::make('visitor')
                    ->label('Pengunjung'),
                TextColumn::make('published_at')
                    ->label('Terbit')
                    ->since(),
            ]);
    }

    public function getDescription(): ?string
    {
        return 'Artikel populer.';
    }
}
