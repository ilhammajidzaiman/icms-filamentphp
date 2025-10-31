<?php

namespace App\Filament\Resources\Setting\SettingSosmeds;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\Setting\SettingSosmed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Setting\SettingSosmeds\Pages\EditSettingSosmed;
use App\Filament\Resources\Setting\SettingSosmeds\Pages\ViewSettingSosmed;
use App\Filament\Resources\Setting\SettingSosmeds\Pages\ListSettingSosmeds;
use App\Filament\Resources\Setting\SettingSosmeds\Pages\CreateSettingSosmed;
use App\Filament\Resources\Setting\SettingSosmeds\Schemas\SettingSosmedForm;
use App\Filament\Resources\Setting\SettingSosmeds\Tables\SettingSosmedsTable;
use App\Filament\Resources\Setting\SettingSosmeds\Schemas\SettingSosmedInfolist;

class SettingSosmedResource extends Resource
{
    protected static ?string $model = SettingSosmed::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Sosmed';
    protected static ?string $slug = 'sosmed';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return SettingSosmedForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SettingSosmedInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingSosmedsTable::configure($table);
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
            'index' => ListSettingSosmeds::route('/'),
            'create' => CreateSettingSosmed::route('/create'),
            'view' => ViewSettingSosmed::route('/{record}'),
            'edit' => EditSettingSosmed::route('/{record}/edit'),
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
