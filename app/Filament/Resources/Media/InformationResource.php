<?php

namespace App\Filament\Resources\Media;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\Media\Information;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\InformationResource\Pages;

class InformationResource extends Resource
{
    protected static ?string $model = Information::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $navigationGroup = 'Media';
    protected static ?string $modelLabel = 'Informasi';
    protected static ?string $navigationLabel = 'Informasi';
    protected static ?string $slug = 'informasi';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 2;

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
                                Textarea::make('title')
                                    ->autosize()
                                    ->label('Judul')
                                    ->required()
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
                                RichEditor::make('content')
                                    ->label('Isi')
                                    ->required(),
                            ]),
                    ]),
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Lampiran')
                            ->icon('heroicon-o-paper-clip')
                            ->collapsible()
                            ->schema([
                                Toggle::make('is_show')
                                    ->label('Status')
                                    ->required()
                                    ->default(true),
                                FileUpload::make('file')
                                    ->label('File')
                                    ->maxSize(1024)
                                    ->directory('page/' . date('Y/m'))
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Ukuran maksimal: 1 MB.'),
                            ])
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
                ImageColumn::make('file')
                    ->label('File')
                    ->defaultImageUrl(asset('/image/default-img.svg'))
                    ->circular()
                    ->toggleable(),
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
            'index' => Pages\ListInformation::route('/'),
            'create' => Pages\CreateInformation::route('/create'),
            'view' => Pages\ViewInformation::route('/{record}'),
            'edit' => Pages\EditInformation::route('/{record}/edit'),
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
