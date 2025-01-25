<?php

namespace App\Filament\Resources\Feature;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Feature\People;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Feature\PeopleResource\Pages;

class PeopleResource extends Resource
{
    protected static ?string $model = People::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Fitur';
    protected static ?string $modelLabel = 'Tim';
    protected static ?string $navigationLabel = 'Tim';
    protected static ?string $slug = 'tim';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Grid::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Isi')
                            ->icon('heroicon-o-newspaper')
                            ->schema([
                                TextInput::make('order')
                                    ->label('Urutan')
                                    ->required()
                                    ->numeric()
                                    ->default(1),
                                Select::make('people_position_id')
                                    ->label('Jabatan')
                                    ->required()
                                    ->forceSearchCaseInsensitive()
                                    ->searchable()
                                    ->preload()
                                    ->relationship(
                                        name: 'peoplePosition',
                                        titleAttribute: 'title',
                                        modifyQueryUsing: fn(Builder $query) => $query
                                            ->orderBy('title')
                                            ->where('is_show', true)
                                    ),
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->maxLength(255),
                                RichEditor::make('description')
                                    ->label('Deskripsi')
                                    ->required(),
                            ]),
                    ]),
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Lampiran')
                            ->icon('heroicon-o-paper-clip')
                            ->schema([
                                Toggle::make('is_show')
                                    ->label('Status')
                                    ->required()
                                    ->default(true),
                                FileUpload::make('file')
                                    ->label('File')
                                    ->required()
                                    ->maxSize(1024)
                                    ->directory('blog-article/' . date('Y/m'))
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Ukuran maksimal: 1 MB.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label('File')
                    ->defaultImageUrl(asset('/image/default-user.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('peoplePosition.title')
                    ->label('Jabatan')
                    ->badge()
                    ->color('info')
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePeople::route('/create'),
            'view' => Pages\ViewPeople::route('/{record}'),
            'edit' => Pages\EditPeople::route('/{record}/edit'),
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
