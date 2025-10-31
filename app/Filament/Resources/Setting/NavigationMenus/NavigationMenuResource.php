<?php

namespace App\Filament\Resources\Setting\NavigationMenus;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\Setting\NavigationMenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Setting\NavigationMenus\Pages\EditNavigationMenu;
use App\Filament\Resources\Setting\NavigationMenus\Pages\ViewNavigationMenu;
use App\Filament\Resources\Setting\NavigationMenus\Pages\ListNavigationMenus;
use App\Filament\Resources\Setting\NavigationMenus\Pages\CreateNavigationMenu;
use App\Filament\Resources\Setting\NavigationMenus\Schemas\NavigationMenuForm;
use App\Filament\Resources\Setting\NavigationMenus\Tables\NavigationMenusTable;
use App\Filament\Resources\Setting\NavigationMenus\Schemas\NavigationMenuInfolist;

class NavigationMenuResource extends Resource
{
    protected static ?string $model = NavigationMenu::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Navigasi Menu';
    protected static ?string $slug = 'navigasi-menu';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return NavigationMenuForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NavigationMenuInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NavigationMenusTable::configure($table);
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
            'index' => ListNavigationMenus::route('/'),
            'create' => CreateNavigationMenu::route('/create'),
            'view' => ViewNavigationMenu::route('/{record}'),
            'edit' => EditNavigationMenu::route('/{record}/edit'),
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
