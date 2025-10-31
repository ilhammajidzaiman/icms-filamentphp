<?php

namespace App\Filament\Resources\Post\BlogCategories;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Post\BlogCategory;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogCategories\Pages\EditBlogCategory;
use App\Filament\Resources\Post\BlogCategories\Pages\ViewBlogCategory;
use App\Filament\Resources\Post\BlogCategories\Pages\CreateBlogCategory;
use App\Filament\Resources\Post\BlogCategories\Pages\ListBlogCategories;
use App\Filament\Resources\Post\BlogCategories\Schemas\BlogCategoryForm;
use App\Filament\Resources\Post\BlogCategories\Tables\BlogCategoriesTable;
use App\Filament\Resources\Post\BlogCategories\Schemas\BlogCategoryInfolist;

class BlogCategoryResource extends Resource
{
    protected static ?string $model = BlogCategory::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Post';
    protected static ?string $pluralModelLabel = 'Kategori';
    protected static ?string $slug = 'kategori';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BlogCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogCategoriesTable::configure($table);
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
            'index' => ListBlogCategories::route('/'),
            'create' => CreateBlogCategory::route('/create'),
            'view' => ViewBlogCategory::route('/{record}'),
            'edit' => EditBlogCategory::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
