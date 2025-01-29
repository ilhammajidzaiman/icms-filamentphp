<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\BlogArticleResource\Pages;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Components\Section as InfolistsSection;

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
                        Section::make('Informasi')
                            ->icon('heroicon-o-information-circle')
                            ->collapsible()
                            ->schema([
                                Toggle::make('is_show')
                                    ->label('Status')
                                    ->required()
                                    ->default(true),
                                DateTimePicker::make('published_at')
                                    ->label('Tanggal rilis')
                                    ->required()
                                    ->default(now()),
                                Select::make('blog_category_id')
                                    ->label('Kategori')
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
                                    ->label('Tanda/Topik')
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
                        Section::make('Lampiran')
                            ->icon('heroicon-o-paper-clip')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('file')
                                    ->label('File')
                                    ->helperText('Ukuran maksimal: 1 MB.')
                                    ->directory('blog-article/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->required()
                                    ->maxSize(1024),
                                Textarea::make('description')
                                    ->label('Keterangan Gambar')
                                    ->autosize()
                                    ->maxLength(255),
                                FileUpload::make('attachment')
                                    ->label('Galeri')
                                    ->helperText('Ukuran maksimal: 1 MB.  Jumlah maksimal: 5 File.')
                                    ->directory('blog-article-attachment/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->multiple()
                                    ->reorderable()
                                    ->maxFiles(10),
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
                    ->defaultImageUrl(asset('/image/default-img.svg'))
                    ->circular(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('visitor')
                    ->label('Pengunjung')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('blogCategory.title')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('blogTags.title')
                    ->label('Tanda/Topik')
                    ->badge()
                    ->color('success')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('published_at')
                    ->label('Diterbitkan ')
                    ->dateTime()
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

        // $user = auth()->user();
        // return parent::getEloquentQuery()
        //     ->when($user->hasRole('super-admin') || $user->hasRole('admin'), function ($query) use ($user) {
        //         return $query;
        //     })
        //     ->when($user->hasRole('user'), function ($query) use ($user) {
        //         return $query->where('user_id', $user->user_id);
        //     });
    }
}
