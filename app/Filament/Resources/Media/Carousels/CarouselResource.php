<?php

namespace App\Filament\Resources\Media\Carousels;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\Media\Carousel;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\Carousels\Pages\EditCarousel;
use App\Filament\Resources\Media\Carousels\Pages\ViewCarousel;
use App\Filament\Resources\Media\Carousels\Pages\ListCarousels;
use App\Filament\Resources\Media\Carousels\Pages\CreateCarousel;
use App\Filament\Resources\Media\Carousels\Schemas\CarouselForm;
use App\Filament\Resources\Media\Carousels\Tables\CarouselsTable;
use App\Filament\Resources\Media\Carousels\Schemas\CarouselInfolist;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $pluralModelLabel = 'Carousel';
    protected static ?string $slug = 'carousel';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return CarouselForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarouselInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarouselsTable::configure($table);
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
            'index' => ListCarousels::route('/'),
            'create' => CreateCarousel::route('/create'),
            'view' => ViewCarousel::route('/{record}'),
            'edit' => EditCarousel::route('/{record}/edit'),
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
