<?php

namespace App\Filament\Resources\Media;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Media\Video;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\VideoResource\Pages;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Media';
    protected static ?string $modelLabel = 'Video';
    protected static ?string $navigationLabel = 'Video';
    protected static ?string $slug = 'video';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Toggle::make('is_show')
                            ->label('Status')
                            ->required()
                            ->default(true),
                        Textarea::make('title')
                            ->label('Judul')
                            ->required()
                            ->autosize()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Slug akan otomatis dihasilkan dari judul.'),
                        Textarea::make('url')
                            ->label('Url/Link Video Youtube')
                            ->required()
                            ->autosize()
                            ->maxLength(1024),
                        Textarea::make('embed')
                            ->label('Embed Video Youtube')
                            ->required()
                            ->autosize()
                            ->maxLength(1024),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(isFromZero: false),
                TextColumn::make('title')
                    ->label('Judul')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                ToggleColumn::make('is_show')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()->color('success'),
                    Tables\Actions\DeleteAction::make()->color('danger'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'view' => Pages\ViewVideo::route('/{record}'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
