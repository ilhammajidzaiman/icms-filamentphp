<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Post\Page;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
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
use App\Filament\Resources\Post\PageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Section::make(Str::headline(__('rincian')))
                    ->icon('heroicon-o-information-circle')
                    ->columnSpan(2)
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->required()
                            ->default(true),
                        Textarea::make('title')
                            ->label(Str::headline(__('judul')))
                            ->required()
                            ->autosize()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        RichEditor::make('content')
                            ->label(Str::headline(__('konten')))
                            ->required(),
                    ]),
                Section::make(Str::headline(__('lampiran')))
                    ->icon('heroicon-o-paper-clip')
                    ->columnSpan(1)
                    ->collapsible()
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::headline(__('file')))
                            ->helperText(Str::ucfirst(__('ukuran maksimal: 10 MB.')))
                            ->directory('page/' . date('Y/m'))
                            ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::headline(__('no')))
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label(Str::headline(__('file')))
                    ->defaultImageUrl(asset('/image/default-img.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('title')
                    ->label(Str::headline(__('judul')))
                    ->wrap()
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
