<?php

namespace App\Filament\Resources\Feature;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Feature\People;
use Filament\Resources\Resource;
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
                Section::make(Str::headline(__('rincian')))
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->columnSpan(2)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->default(true),
                        TextInput::make('order')
                            ->label(Str::headline(__('urutan')))
                            ->required()
                            ->numeric()
                            ->default(1),
                        Select::make('people_position_id')
                            ->label(Str::headline(__('jabatan')))
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
                            ->label(Str::headline(__('nama')))
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('description')
                            ->label(Str::headline(__('deskripsi')))
                            ->required(),
                    ]),
                Section::make(Str::headline(__('lampiran')))
                    ->icon('heroicon-o-paper-clip')
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::headline(__('file')))
                            ->helperText(Str::ucfirst(__('ukuran maksimal: 10 MB.')))
                            ->directory('people-file/' . date('Y/m'))
                            ->optimize('webp')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1'])
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
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
                    ->label(Str::headline(__('no')))
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label(Str::headline(__('file')))
                    ->defaultImageUrl(asset('/image/default-user.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('order')
                    ->label(Str::headline(__('urutan')))
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(Str::headline(__('nama')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('peoplePosition.title')
                    ->label(Str::headline(__('jabatan')))
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_show')
                    ->label(Str::headline(__('status')))
                    ->sortable()
                    ->searchable()
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
