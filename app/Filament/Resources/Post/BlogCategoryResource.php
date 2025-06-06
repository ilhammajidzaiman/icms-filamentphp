<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\Post\BlogCategory;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogCategoryResource\Pages;

class BlogCategoryResource extends Resource
{
    protected static ?string $model = BlogCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationParentItem = 'Artikel';
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $navigationLabel = 'Kategori';
    protected static ?string $slug = 'kategori';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->default(true),
                        TextInput::make('title')
                            ->label(Str::headline(__('judul')))
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->disabled()
                            ->dehydrated()
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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'view' => Pages\ViewBlogCategory::route('/{record}'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
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
