<?php

namespace App\Filament\Resources\Post\BlogArticles\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Set;

class BlogArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(4)
            ->components([
                Section::make(Str::title(__('form')))
                    ->collapsible()
                    ->columnSpan(2)
                    ->schema([
                        Textarea::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->autosize()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::title(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        RichEditor::make('content')
                            ->label(Str::title(__('isi')))
                            ->required(),
                    ]),
                Section::make(Str::title(__('informasi')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        DateTimePicker::make('published_at')
                            ->label(Str::title(__('Tanggal rilis')))
                            ->required()
                            ->default(now()),
                        Select::make('blog_category_id')
                            ->label(Str::title(__('kategori')))
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
                            ->label(Str::title(__('topik')))
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
                Section::make(Str::title(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::ucfirst(__('ukuran maksimal: 10 MB.')))
                            ->directory('blog-article/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                        Textarea::make('description')
                            ->label(Str::title(__('keterangan gambar')))
                            ->autosize()
                            ->maxLength(255),
                        FileUpload::make('attachment')
                            ->label(Str::title(__('lampiran')))
                            ->helperText(Str::ucfirst(__('Ukuran maksimal: 10 MB. Jumlah maksimal: 5 File.')))
                            ->directory('blog-article-attachment/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->openable()
                            ->downloadable()
                            ->imageEditor()
                            ->multiple()
                            ->maxFiles(20)
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
