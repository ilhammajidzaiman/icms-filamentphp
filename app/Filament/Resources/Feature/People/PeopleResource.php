<?php

namespace App\Filament\Resources\Feature\People;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\Feature\People;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\People\Pages\EditPeople;
use App\Filament\Resources\Feature\People\Pages\ListPeople;
use App\Filament\Resources\Feature\People\Pages\ViewPeople;
use App\Filament\Resources\Feature\People\Pages\CreatePeople;
use App\Filament\Resources\Feature\People\Schemas\PeopleForm;
use App\Filament\Resources\Feature\People\Tables\PeopleTable;
use App\Filament\Resources\Feature\People\Schemas\PeopleInfolist;

class PeopleResource extends Resource
{
    protected static ?string $model = People::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $pluralModelLabel = 'Tim';
    protected static ?string $slug = 'tim';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PeopleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PeopleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeopleTable::configure($table);
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
            'index' => ListPeople::route('/'),
            'create' => CreatePeople::route('/create'),
            'view' => ViewPeople::route('/{record}'),
            'edit' => EditPeople::route('/{record}/edit'),
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
