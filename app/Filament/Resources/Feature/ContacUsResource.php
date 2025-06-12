<?php

namespace App\Filament\Resources\Feature;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Feature\ContacUs;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\ContacUsResource\Pages;

class ContacUsResource extends Resource
{
    protected static ?string $model = ContacUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-arrow-down-left';
    protected static ?string $navigationGroup = 'Fitur';
    protected static ?string $modelLabel = 'Hubungi Kami';
    protected static ?string $navigationLabel = 'Hubungi Kami';
    protected static ?string $slug = 'hubungi-kami';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(Str::headline(__('rincian')))
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->default(true),
                        TextInput::make('name')
                            ->label(Str::headline(__('nama')))
                            ->maxLength(1024),
                        TextInput::make('email')
                            ->label(Str::headline(__('email')))
                            ->maxLength(1024),
                        TextInput::make('subject')
                            ->label(Str::headline(__('subjek')))
                            ->maxLength(1024),
                        Textarea::make('message')
                            ->label(Str::headline(__('pesan')))
                            ->autosize()
                            ->maxLength(1024),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::headline(__('no')))
                    ->rowIndex(isFromZero: false),
                TextColumn::make('name')
                    ->label(Str::headline(__('nama')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->label(Str::headline(__('email')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('subject')
                    ->label(Str::headline(__('subjek')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_show')
                    ->label(Str::headline(__('status')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()->color('success'),
                    Tables\Actions\DeleteAction::make()->color('danger'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacUs::route('/'),
            'create' => Pages\CreateContacUs::route('/create'),
            'view' => Pages\ViewContacUs::route('/{record}'),
            'edit' => Pages\EditContacUs::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
