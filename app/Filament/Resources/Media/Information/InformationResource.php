<?php

namespace App\Filament\Resources\Media\Information;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Media\Information;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\Information\Pages\EditInformation;
use App\Filament\Resources\Media\Information\Pages\ListInformation;
use App\Filament\Resources\Media\Information\Pages\ViewInformation;
use App\Filament\Resources\Media\Information\Pages\CreateInformation;
use App\Filament\Resources\Media\Information\Schemas\InformationForm;
use App\Filament\Resources\Media\Information\Tables\InformationTable;
use App\Filament\Resources\Media\Information\Schemas\InformationInfolist;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $pluralModelLabel = 'Informasi';
    protected static ?string $slug = 'informasi';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return InformationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InformationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InformationTable::configure($table);
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
            'index' => ListInformation::route('/'),
            'create' => CreateInformation::route('/create'),
            'view' => ViewInformation::route('/{record}'),
            'edit' => EditInformation::route('/{record}/edit'),
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
