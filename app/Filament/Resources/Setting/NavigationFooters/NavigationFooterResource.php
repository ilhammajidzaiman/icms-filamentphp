<?php

namespace App\Filament\Resources\Setting\NavigationFooters;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\Setting\NavigationFooter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Setting\NavigationFooters\Pages\EditNavigationFooter;
use App\Filament\Resources\Setting\NavigationFooters\Pages\ViewNavigationFooter;
use App\Filament\Resources\Setting\NavigationFooters\Pages\ListNavigationFooters;
use App\Filament\Resources\Setting\NavigationFooters\Pages\CreateNavigationFooter;
use App\Filament\Resources\Setting\NavigationFooters\Schemas\NavigationFooterForm;
use App\Filament\Resources\Setting\NavigationFooters\Tables\NavigationFootersTable;
use App\Filament\Resources\Setting\NavigationFooters\Schemas\NavigationFooterInfolist;

class NavigationFooterResource extends Resource
{
    protected static ?string $model = NavigationFooter::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Navigasi Footer';
    protected static ?string $slug = 'navigasi-footer';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return NavigationFooterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NavigationFooterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NavigationFootersTable::configure($table);
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
            'index' => ListNavigationFooters::route('/'),
            'create' => CreateNavigationFooter::route('/create'),
            'view' => ViewNavigationFooter::route('/{record}'),
            'edit' => EditNavigationFooter::route('/{record}/edit'),
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
