<?php

namespace App\Filament\Resources\Media\Images;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use App\Models\Media\Image;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\Images\Pages\EditImage;
use App\Filament\Resources\Media\Images\Pages\ViewImage;
use App\Filament\Resources\Media\Images\Pages\ListImages;
use App\Filament\Resources\Media\Images\Pages\CreateImage;
use App\Filament\Resources\Media\Images\Schemas\ImageForm;
use App\Filament\Resources\Media\Images\Tables\ImagesTable;
use App\Filament\Resources\Media\Images\Schemas\ImageInfolist;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $pluralModelLabel = 'Image';
    protected static ?string $slug = 'image';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return ImageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ImageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImagesTable::configure($table);
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
            'index' => ListImages::route('/'),
            'create' => CreateImage::route('/create'),
            'view' => ViewImage::route('/{record}'),
            'edit' => EditImage::route('/{record}/edit'),
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
