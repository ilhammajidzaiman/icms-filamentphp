<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
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
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogArticleResource\Pages;

class BlogArticleResource extends Resource
{
    protected static ?string $model = BlogArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $modelLabel = 'Artikel';
    protected static ?string $navigationLabel = 'Artikel';
    protected static ?string $slug = 'artikel';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Grid::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make(Str::headline(__('isi')))
                            ->icon('heroicon-o-newspaper')
                            ->schema([
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
                                    ->label(Str::headline(__('isi')))
                                    ->required(),
                            ]),
                    ]),
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make(Str::headline(__('informasi')))
                            ->icon('heroicon-o-information-circle')
                            ->collapsible()
                            ->schema([
                                Toggle::make('is_show')
                                    ->label(Str::headline(__('status')))
                                    ->default(true),
                                DateTimePicker::make('published_at')
                                    ->label(Str::headline(__('Tanggal rilis')))
                                    ->required()
                                    ->default(now()),
                                Select::make('blog_category_id')
                                    ->label(Str::headline(__('kategori')))
                                    ->required()
                                    ->forceSearchCaseInsensitive()
                                    ->searchable()
                                    ->preload()
                                    ->relationship(
                                        name: 'blogCategory',
                                        titleAttribute: 'title',
                                        modifyQueryUsing: fn(Builder $query) => $query
                                            ->orderBy('title')
                                            ->where('is_show', true)
                                    ),
                                Select::make('blogTags')
                                    ->label(Str::headline(__('topik')))
                                    ->required()
                                    ->multiple()
                                    ->forceSearchCaseInsensitive()
                                    ->searchable()
                                    ->preload()
                                    ->relationship(
                                        name: 'blogTags',
                                        titleAttribute: 'title',
                                        modifyQueryUsing: fn(Builder $query) => $query
                                            ->orderBy('title')
                                            ->where('is_show', true),
                                    ),
                            ]),
                        Section::make(Str::headline(__('lampiran')))
                            ->icon('heroicon-o-paper-clip')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('file')
                                    ->label(Str::headline(__('file')))
                                    ->helperText(Str::ucfirst(__('ukuran maksimal: 10 MB.')))
                                    ->directory('blog-article/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->maxSize(10240),
                                Textarea::make('description')
                                    ->label(Str::headline(__('keterangan gambar')))
                                    ->autosize()
                                    ->maxLength(255),
                                FileUpload::make('attachment')
                                    ->label(Str::headline(__('lampiran')))
                                    ->helperText(Str::ucfirst(__('Ukuran maksimal: 10 MB. Jumlah maksimal: 5 File.')))
                                    ->directory('blog-article-attachment/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->openable()
                                    ->downloadable()
                                    ->imageEditor()
                                    ->multiple()
                                    ->maxFiles(20)
                                    ->maxSize(10240),
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
                    ->label(Str::headline(__('no')))
                    ->rowIndex(isFromZero: false),
                ImageColumn::make('file')
                    ->label(Str::headline(__('file')))
                    ->defaultImageUrl(asset('/image/default-img.svg'))
                    ->circular(),
                TextColumn::make('title')
                    ->label(Str::headline(__('judul')))
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('visitor')
                    ->label(Str::headline(__('pengunjung')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('blogCategory.title')
                    ->label(Str::headline(__('kategori')))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('blogTags.title')
                    ->label(Str::headline(__('topik')))
                    ->badge()
                    ->color('success')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('published_at')
                    ->label(Str::headline(__('diterbitkan ')))
                    ->dateTime()
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
            'index' => Pages\ListBlogArticles::route('/'),
            'create' => Pages\CreateBlogArticle::route('/create'),
            'view' => Pages\ViewBlogArticle::route('/{record}'),
            'edit' => Pages\EditBlogArticle::route('/{record}/edit'),
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
