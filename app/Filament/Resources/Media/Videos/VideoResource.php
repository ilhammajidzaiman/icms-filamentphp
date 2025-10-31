<?php

namespace App\Filament\Resources\Media\Videos;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use App\Models\Media\Video;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\Videos\Pages\EditVideo;
use App\Filament\Resources\Media\Videos\Pages\ViewVideo;
use App\Filament\Resources\Media\Videos\Pages\ListVideos;
use App\Filament\Resources\Media\Videos\Pages\CreateVideo;
use App\Filament\Resources\Media\Videos\Schemas\VideoForm;
use App\Filament\Resources\Media\Videos\Tables\VideosTable;
use App\Filament\Resources\Media\Videos\Schemas\VideoInfolist;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $pluralModelLabel = 'Video';
    protected static ?string $slug = 'video';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return VideoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VideoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VideosTable::configure($table);
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
            'index' => ListVideos::route('/'),
            'create' => CreateVideo::route('/create'),
            'view' => ViewVideo::route('/{record}'),
            'edit' => EditVideo::route('/{record}/edit'),
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
