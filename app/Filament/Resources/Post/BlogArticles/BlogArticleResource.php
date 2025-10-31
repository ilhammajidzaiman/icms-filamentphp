<?php

namespace App\Filament\Resources\Post\BlogArticles;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\Post\BlogArticle;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogArticles\Pages\EditBlogArticle;
use App\Filament\Resources\Post\BlogArticles\Pages\ViewBlogArticle;
use App\Filament\Resources\Post\BlogArticles\Pages\ListBlogArticles;
use App\Filament\Resources\Post\BlogArticles\Pages\CreateBlogArticle;
use App\Filament\Resources\Post\BlogArticles\Schemas\BlogArticleForm;
use App\Filament\Resources\Post\BlogArticles\Tables\BlogArticlesTable;
use App\Filament\Resources\Post\BlogArticles\Schemas\BlogArticleInfolist;

class BlogArticleResource extends Resource
{
    protected static ?string $model = BlogArticle::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Post';
    protected static ?string $pluralModelLabel = 'Artikel';
    protected static ?string $slug = 'artikel';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return BlogArticleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogArticleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogArticlesTable::configure($table);
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
            'index' => ListBlogArticles::route('/'),
            'create' => CreateBlogArticle::route('/create'),
            'view' => ViewBlogArticle::route('/{record}'),
            'edit' => EditBlogArticle::route('/{record}/edit'),
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
