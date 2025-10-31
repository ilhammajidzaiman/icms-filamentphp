<?php

namespace App\Filament\Resources\Setting\SettingPages;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Models\Setting\SettingPage;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Setting\SettingPages\Pages\EditSettingPage;
use App\Filament\Resources\Setting\SettingPages\Pages\ViewSettingPage;
use App\Filament\Resources\Setting\SettingPages\Pages\ListSettingPages;
use App\Filament\Resources\Setting\SettingPages\Pages\CreateSettingPage;
use App\Filament\Resources\Setting\SettingPages\Schemas\SettingPageForm;
use App\Filament\Resources\Setting\SettingPages\Tables\SettingPagesTable;
use App\Filament\Resources\Setting\SettingPages\Schemas\SettingPageInfolist;

class SettingPageResource extends Resource
{
    protected static ?string $model = SettingPage::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Page';
    protected static ?string $slug = 'page';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return SettingPageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SettingPageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingPagesTable::configure($table);
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
            'index' => ListSettingPages::route('/'),
            'create' => CreateSettingPage::route('/create'),
            'view' => ViewSettingPage::route('/{record}'),
            'edit' => EditSettingPage::route('/{record}/edit'),
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
