<?php

namespace App\Filament\Resources\Media\Files;

use UnitEnum;
use BackedEnum;
use App\Models\Media\File;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\Files\Pages\EditFile;
use App\Filament\Resources\Media\Files\Pages\ViewFile;
use App\Filament\Resources\Media\Files\Pages\ListFiles;
use App\Filament\Resources\Media\Files\Pages\CreateFile;
use App\Filament\Resources\Media\Files\Schemas\FileForm;
use App\Filament\Resources\Media\Files\Tables\FilesTable;
use App\Filament\Resources\Media\Files\Schemas\FileInfolist;

class FileResource extends Resource
{
    protected static ?string $model = File::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Media';
    protected static ?string $pluralModelLabel = 'File';
    protected static ?string $slug = 'file';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return FileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FilesTable::configure($table);
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
            'index' => ListFiles::route('/'),
            'create' => CreateFile::route('/create'),
            'view' => ViewFile::route('/{record}'),
            'edit' => EditFile::route('/{record}/edit'),
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
