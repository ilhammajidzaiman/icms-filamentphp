<?php

namespace App\Filament\Resources\Feature\People\Tables;

use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;

class PeopleTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->reorderable('order')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::title(__('no')))
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label(Str::title(__('file')))
                    ->defaultImageUrl(asset('/image/default-user.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('order')
                    ->label(Str::title(__('urutan')))
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(Str::title(__('nama')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('position.title')
                    ->label(Str::title(__('jabatan')))
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_show')
                    ->label(Str::title(__('status')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()->color('secondary'),
                    EditAction::make()->color('success'),
                    DeleteAction::make()->color('danger'),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
