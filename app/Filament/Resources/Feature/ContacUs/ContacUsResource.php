<?php

namespace App\Filament\Resources\Feature\ContacUs;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\Feature\ContacUs;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\ContacUs\Pages\EditContacUs;
use App\Filament\Resources\Feature\ContacUs\Pages\ListContacUs;
use App\Filament\Resources\Feature\ContacUs\Pages\ViewContacUs;
use App\Filament\Resources\Feature\ContacUs\Pages\CreateContacUs;
use App\Filament\Resources\Feature\ContacUs\Schemas\ContacUsForm;
use App\Filament\Resources\Feature\ContacUs\Tables\ContacUsTable;
use App\Filament\Resources\Feature\ContacUs\Schemas\ContacUsInfolist;

class ContacUsResource extends Resource
{
    protected static ?string $model = ContacUs::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $pluralModelLabel = 'Contac Us';
    protected static ?string $slug = 'contac-us';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ContacUsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContacUsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContacUsTable::configure($table);
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
            'index' => ListContacUs::route('/'),
            'create' => CreateContacUs::route('/create'),
            'view' => ViewContacUs::route('/{record}'),
            'edit' => EditContacUs::route('/{record}/edit'),
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
