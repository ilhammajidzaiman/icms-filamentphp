<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BlogArticle;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
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
use App\Filament\Resources\BlogArticleResource\Pages;
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
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
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
                                        modifyQueryUsing: fn (Builder $query) => $query
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
                                        modifyQueryUsing: fn (Builder $query) => $query
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
                                    ->required()
                                    ->maxSize(1024)
                                    ->directory('blog-article/' . date('Y/m'))
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Ukuran maksimal: 1 MB.'),
                                Textarea::make('file_description')
                                    ->label('Keterangan Gambar')
                                    ->autosize()
                                    ->maxLength(255),
                                FileUpload::make('attachment')
                                    ->label('Galeri')
                                    ->directory('blog-article-attachment/' . date('Y/m'))
                                    ->image()
                                    ->multiple()
                                    ->maxFiles(5)
                                    ->reorderable()
                                    ->columnSpanFull()
                                    ->helperText('Ukuran maksimal: 1 MB.  Jumlah maksimal: 5 File.'),
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
                    ->circular(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('visitor')
                    ->label('Pengunjung')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('blogCategory.title')
                    ->label('Kategori')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('blogTags.title')
                    ->label('Tanda/Topik')
                    ->badge()
                    ->color('success')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('published_at')
                    ->label('Diterbitkan ')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label('Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_show')
                    ->label('Status')
                    ->sortable(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(3)
            ->schema([
                InfolistsSection::make()
                    ->columnSpan(2)
                    ->schema([
                        ImageEntry::make('file')
                            ->hiddenlabel('Gambar')
                            ->defaultImageUrl(asset('/image/default-img.svg')),
                        TextEntry::make('title')
                            ->label('Judul')
                            ->weight(FontWeight::Medium)
                            ->size(TextEntrySize::Large),
                        TextEntry::make('slug')
                            ->label('Slug')
                            ->color('gray'),
                        TextEntry::make('blogCategory.title')
                            ->label('Kategori')
                            ->color('primary'),
                        TextEntry::make('content')
                            ->label('Content')
                            ->html(),
                        TextEntry::make('blogTags.title')
                            ->label('Tanda/Topik')
                            ->badge()
                            ->separator(',')
                            ->size(TextEntrySize::Large),
                    ]),
                InfolistsSection::make()
                    ->columnSpan(1)
                    ->schema([
                        IconEntry::make('is_show')
                            ->label('Status')
                            ->boolean(),
                        TextEntry::make('visitor')
                            ->label('Pengunjung'),
                        TextEntry::make('user.name')
                            ->label('Penulis')
                            ->badge(),
                        TextEntry::make('published_at')
                            ->label('Diterbitkan ')
                            ->since(),
                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->since(),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui')
                            ->since(),
                    ])
            ]);
    }
}
