<?php

namespace App\Filament\Resources\Media\FileCategories;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Media\FileCategory;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\FileCategories\Pages\EditFileCategory;
use App\Filament\Resources\Media\FileCategories\Pages\ViewFileCategory;
use App\Filament\Resources\Media\FileCategories\Pages\CreateFileCategory;
use App\Filament\Resources\Media\FileCategories\Pages\ListFileCategories;
use App\Filament\Resources\Media\FileCategories\Schemas\FileCategoryForm;
use App\Filament\Resources\Media\FileCategories\Tables\FileCategoriesTable;
use App\Filament\Resources\Media\FileCategories\Schemas\FileCategoryInfolist;

class FileCategoryResource extends Resource
{
    protected static ?string $model = FileCategory::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $navigationParentItem = 'File';
    protected static ?string $pluralModelLabel = 'File Kategori';
    protected static ?string $slug = 'file-kategori';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return FileCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FileCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FileCategoriesTable::configure($table);
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
            'index' => ListFileCategories::route('/'),
            'create' => CreateFileCategory::route('/create'),
            'view' => ViewFileCategory::route('/{record}'),
            'edit' => EditFileCategory::route('/{record}/edit'),
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
