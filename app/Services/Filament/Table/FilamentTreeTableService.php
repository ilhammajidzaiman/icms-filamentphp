<?php

namespace App\Services\Filament\Table;

use App\Models\Site\Page;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\ToggleColumn;

class FilamentTreeTableService
{
    public static function columns(): array
    {
        return [
            TextColumn::make('index')
                ->label(Str::title(__('no.')))
                ->rowIndex(isFromZero: false)
                ->toggleable(),
            TextColumn::make('title')
                ->label(Str::title(__('menu')))
                ->wrap()
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('type')
                ->label(Str::title(__('arah ke')))
                ->formatStateUsing(function (Model $record) {
                    $modelType = $record->modelable_type;
                    if ($modelType === BlogArticle::class):
                        return __('Article') ?? null;
                    elseif ($modelType === BlogCategory::class):
                        return __('Kategori') ?? null;
                    elseif ($modelType === Page::class):
                        return __('Page') ?? null;
                    endif;
                })
                ->default('-')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('ke')
                ->label(Str::title(__('judul')))
                ->formatStateUsing(function (Model $record) {
                    $modelType = $record->modelable_type;
                    $modelId = $record->modelable_id;
                    if ($modelType === BlogArticle::class):
                        $record = BlogArticle::where('id', $modelId)
                            ->first();
                        return $record->title ?? null;
                    elseif ($modelType === BlogCategory::class):
                        $record = BlogCategory::where('id', $modelId)
                            ->first();
                        return $record->title ?? null;
                    elseif ($modelType === Page::class):
                        $record = Page::where('id', $modelId)
                            ->first();
                        return $record->title ?? null;
                    endif;
                })
                ->default('-')
                ->sortable()
                ->searchable()
                ->toggleable(),
            ToggleColumn::make('is_show')
                ->label(Str::title(__('status')))
                ->sortable()
                ->searchable()
                ->toggleable(),
        ];
    }
}
