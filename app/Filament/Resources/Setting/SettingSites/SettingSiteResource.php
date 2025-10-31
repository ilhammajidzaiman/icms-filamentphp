<?php

namespace App\Filament\Resources\Setting\SettingSites;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Setting\SettingSite;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Setting\SettingSites\Pages\EditSettingSite;
use App\Filament\Resources\Setting\SettingSites\Pages\ViewSettingSite;
use App\Filament\Resources\Setting\SettingSites\Pages\ListSettingSites;
use App\Filament\Resources\Setting\SettingSites\Pages\CreateSettingSite;
use App\Filament\Resources\Setting\SettingSites\Schemas\SettingSiteForm;
use App\Filament\Resources\Setting\SettingSites\Tables\SettingSitesTable;
use App\Filament\Resources\Setting\SettingSites\Schemas\SettingSiteInfolist;

class SettingSiteResource extends Resource
{
    protected static ?string $model = SettingSite::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Site';
    protected static ?string $slug = 'site';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return SettingSiteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SettingSiteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingSitesTable::configure($table);
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
            'index' => ListSettingSites::route('/'),
            'create' => CreateSettingSite::route('/create'),
            'view' => ViewSettingSite::route('/{record}'),
            'edit' => EditSettingSite::route('/{record}/edit'),
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
