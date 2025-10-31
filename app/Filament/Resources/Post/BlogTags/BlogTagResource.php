<?php

namespace App\Filament\Resources\Post\BlogTags;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use App\Models\Post\BlogTag;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogTags\Pages\EditBlogTag;
use App\Filament\Resources\Post\BlogTags\Pages\ViewBlogTag;
use App\Filament\Resources\Post\BlogTags\Pages\ListBlogTags;
use App\Filament\Resources\Post\BlogTags\Pages\CreateBlogTag;
use App\Filament\Resources\Post\BlogTags\Schemas\BlogTagForm;
use App\Filament\Resources\Post\BlogTags\Tables\BlogTagsTable;
use App\Filament\Resources\Post\BlogTags\Schemas\BlogTagInfolist;

class BlogTagResource extends Resource
{
    protected static ?string $model = BlogTag::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Post';
    protected static ?string $pluralModelLabel = 'Tag';
    protected static ?string $slug = 'tag';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return BlogTagForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogTagInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogTagsTable::configure($table);
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
            'index' => ListBlogTags::route('/'),
            'create' => CreateBlogTag::route('/create'),
            'view' => ViewBlogTag::route('/{record}'),
            'edit' => EditBlogTag::route('/{record}/edit'),
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
