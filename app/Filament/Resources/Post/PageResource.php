<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Post\Page;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Resources\Post\PageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Components\Section as InfolistsSection;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $modelLabel = 'Halaman';
    protected static ?string $navigationLabel = 'Halaman';
    protected static ?string $slug = 'halaman';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 4;

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
                                    ->label('Judul')
                                    ->autosize()
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->helperText('Slug akan otomatis dihasilkan dari judul.')
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->maxLength(255),
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
                                    ->helperText('Ukuran maksimal: 1 MB.')
                                    ->directory('page/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->maxSize(1024),
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label('File')
                    ->circular()
                    ->defaultImageUrl(asset('/image/default-img.svg'))
                    ->toggleable(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_show')
                    ->label('Status')
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
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
