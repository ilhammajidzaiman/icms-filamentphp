<?php

namespace App\Filament\Resources\Media;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\Media\FileCategory;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\FileCategoryResource\Pages;

class FileCategoryResource extends Resource
{
    protected static ?string $model = FileCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Media';
    protected static ?string $navigationParentItem = 'Dokumen';
    protected static ?string $modelLabel = 'Kategori Dokumen';
    protected static ?string $navigationLabel = 'Kategori Dokumen';
    protected static ?string $slug = 'kategori-dokumen';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(Str::headline(__('rincian')))
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->required()
                            ->default(true),
                        TextInput::make('title')
                            ->label(Str::headline(__('judul')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255),
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
                TextColumn::make('title')
                    ->label(Str::headline(__('judul')))
                    ->wrap()
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
            'index' => Pages\ListFileCategories::route('/'),
            'create' => Pages\CreateFileCategory::route('/create'),
            'view' => Pages\ViewFileCategory::route('/{record}'),
            'edit' => Pages\EditFileCategory::route('/{record}/edit'),
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
