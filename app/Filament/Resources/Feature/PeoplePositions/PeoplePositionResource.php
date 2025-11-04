<?php

namespace App\Filament\Resources\Feature\PeoplePositions;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\Feature\PeoplePosition;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\PeoplePositions\Pages\EditPeoplePosition;
use App\Filament\Resources\Feature\PeoplePositions\Pages\ViewPeoplePosition;
use App\Filament\Resources\Feature\PeoplePositions\Pages\ListPeoplePositions;
use App\Filament\Resources\Feature\PeoplePositions\Pages\CreatePeoplePosition;
use App\Filament\Resources\Feature\PeoplePositions\Schemas\PeoplePositionForm;
use App\Filament\Resources\Feature\PeoplePositions\Tables\PeoplePositionsTable;
use App\Filament\Resources\Feature\PeoplePositions\Schemas\PeoplePositionInfolist;

class PeoplePositionResource extends Resource
{
    protected static ?string $model = PeoplePosition::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $navigationParentItem = 'Tim';
    protected static ?string $pluralModelLabel = 'Jabatan';
    protected static ?string $slug = 'jabatan';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PeoplePositionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PeoplePositionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeoplePositionsTable::configure($table);
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
            'index' => ListPeoplePositions::route('/'),
            'create' => CreatePeoplePosition::route('/create'),
            'view' => ViewPeoplePosition::route('/{record}'),
            'edit' => EditPeoplePosition::route('/{record}/edit'),
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
