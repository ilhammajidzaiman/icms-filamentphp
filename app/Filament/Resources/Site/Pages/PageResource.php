<?php

namespace App\Filament\Resources\Site\Pages;

use UnitEnum;
use BackedEnum;
use App\Models\Site\Page;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Site\Pages\Pages\EditPage;
use App\Filament\Resources\Site\Pages\Pages\ViewPage;
use App\Filament\Resources\Site\Pages\Pages\ListPages;
use App\Filament\Resources\Site\Pages\Pages\CreatePage;
use App\Filament\Resources\Site\Pages\Schemas\PageForm;
use App\Filament\Resources\Site\Pages\Tables\PagesTable;
use App\Filament\Resources\Site\Pages\Schemas\PageInfolist;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'titlle';
    protected static string | UnitEnum | null $navigationGroup = 'Situs';
    protected static ?string $pluralModelLabel = 'Halaman';
    protected static ?string $slug = 'halaman';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'view' => ViewPage::route('/{record}'),
            'edit' => EditPage::route('/{record}/edit'),
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
