<?php

namespace App\Filament\Resources\Feature\FeedbackCategories;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\Feature\FeedbackCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\FeedbackCategories\Pages\EditFeedbackCategory;
use App\Filament\Resources\Feature\FeedbackCategories\Pages\ViewFeedbackCategory;
use App\Filament\Resources\Feature\FeedbackCategories\Pages\CreateFeedbackCategory;
use App\Filament\Resources\Feature\FeedbackCategories\Pages\ListFeedbackCategories;
use App\Filament\Resources\Feature\FeedbackCategories\Schemas\FeedbackCategoryForm;
use App\Filament\Resources\Feature\FeedbackCategories\Tables\FeedbackCategoriesTable;
use App\Filament\Resources\Feature\FeedbackCategories\Schemas\FeedbackCategoryInfolist;

class FeedbackCategoryResource extends Resource
{
    protected static ?string $model = FeedbackCategory::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $pluralModelLabel = 'Feedback Category';
    protected static ?string $slug = 'feedback-category';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return FeedbackCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeedbackCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedbackCategoriesTable::configure($table);
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
            'index' => ListFeedbackCategories::route('/'),
            'create' => CreateFeedbackCategory::route('/create'),
            'view' => ViewFeedbackCategory::route('/{record}'),
            'edit' => EditFeedbackCategory::route('/{record}/edit'),
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
