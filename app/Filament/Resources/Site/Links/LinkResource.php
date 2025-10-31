<?php

namespace App\Filament\Resources\Site\Links;

use UnitEnum;
use BackedEnum;
use App\Models\Site\Link;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Site\Links\Pages\EditLink;
use App\Filament\Resources\Site\Links\Pages\ViewLink;
use App\Filament\Resources\Site\Links\Pages\ListLinks;
use App\Filament\Resources\Site\Links\Pages\CreateLink;
use App\Filament\Resources\Site\Links\Schemas\LinkForm;
use App\Filament\Resources\Site\Links\Tables\LinksTable;
use App\Filament\Resources\Site\Links\Schemas\LinkInfolist;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Situs';
    protected static ?string $pluralModelLabel = 'Tautan';
    protected static ?string $slug = 'tautan';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return LinkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LinkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinksTable::configure($table);
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
            'index' => ListLinks::route('/'),
            'create' => CreateLink::route('/create'),
            'view' => ViewLink::route('/{record}'),
            'edit' => EditLink::route('/{record}/edit'),
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
