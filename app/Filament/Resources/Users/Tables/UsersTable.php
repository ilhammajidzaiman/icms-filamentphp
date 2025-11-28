<?php

namespace App\Filament\Resources\Users\Tables;

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
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::title(__('no.')))
                    ->rowIndex(isFromZero: false)
                    ->toggleable(),
                ImageColumn::make('profile.file')
                    ->label(Str::title(__('file')))
                    ->defaultImageUrl(asset('/images/default-user.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(Str::title(__('nama')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('username')
                    ->label(Str::title(__('username')))
                    ->copyable()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(Str::title(__('email')))
                    ->copyable()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('roles.name')
                    ->label(Str::title(__('peran')))
                    ->default('-')
                    ->badge()
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
