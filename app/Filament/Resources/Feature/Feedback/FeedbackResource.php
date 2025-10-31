<?php

namespace App\Filament\Resources\Feature\Feedback;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\Feature\Feedback;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\Feedback\Pages\EditFeedback;
use App\Filament\Resources\Feature\Feedback\Pages\ListFeedback;
use App\Filament\Resources\Feature\Feedback\Pages\ViewFeedback;
use App\Filament\Resources\Feature\Feedback\Pages\CreateFeedback;
use App\Filament\Resources\Feature\Feedback\Schemas\FeedbackForm;
use App\Filament\Resources\Feature\Feedback\Tables\FeedbackTable;
use App\Filament\Resources\Feature\Feedback\Schemas\FeedbackInfolist;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $pluralModelLabel = 'Feedback';
    protected static ?string $slug = 'feedback';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return FeedbackForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeedbackInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedbackTable::configure($table);
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
            'index' => ListFeedback::route('/'),
            'create' => CreateFeedback::route('/create'),
            'view' => ViewFeedback::route('/{record}'),
            'edit' => EditFeedback::route('/{record}/edit'),
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
