<?php

namespace App\Services\Form;

use Filament\Forms\Set;
use App\Models\Post\Link;
use App\Models\Post\Page;
use App\Models\Media\File;
use App\Models\Media\Image;
use App\Models\Media\Video;
use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use App\Models\Post\BlogArticle;
use App\Models\Media\Information;
use App\Models\Post\BlogCategory;
use App\Models\Media\FileCategory;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MorphToSelect;

class NavMenuFormService
{
    public static function schema(): array
    {
        return [
            Hidden::make('parent_id')
                ->required()
                ->default(-1)
                ->disabled()
                ->dehydrated(),
            Section::make()
                ->schema([
                    Toggle::make('is_show')
                        ->label(Str::headline(__('status')))
                        ->default(true),
                    TextInput::make('order')
                        ->required()
                        ->numeric()
                        ->default(0),
                    Textinput::make('title')
                        ->label(Str::headline(__('judul')))
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->maxLength(1024),
                    TextInput::make('slug')
                        ->label(Str::headline(__('slug')))
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(1024),
                    MorphToSelect::make('modelable')
                        ->label(Str::headline(__('arahkan ke')))
                        ->required()
                        ->native(false)
                        ->searchable()
                        ->preload()
                        ->types([
                            MorphToSelect\Type::make(BlogArticle::class)
                                ->titleAttribute('title')
                                ->label('Artikel'),
                            MorphToSelect\Type::make(BlogCategory::class)
                                ->titleAttribute('title')
                                ->label('Kategori Artikel'),
                            MorphToSelect\Type::make(BlogTag::class)
                                ->titleAttribute('title')
                                ->label('Tag Artikel'),
                            MorphToSelect\Type::make(Page::class)
                                ->titleAttribute('title')
                                ->label('Halaman'),
                            MorphToSelect\Type::make(Link::class)
                                ->titleAttribute('title')
                                ->label('Tautan'),
                            MorphToSelect\Type::make(File::class)
                                ->titleAttribute('title')
                                ->label('Dokumen'),
                            MorphToSelect\Type::make(FileCategory::class)
                                ->titleAttribute('title')
                                ->label('Kategori Dokumen'),
                            MorphToSelect\Type::make(Information::class)
                                ->titleAttribute('title')
                                ->label('Informasi'),
                            MorphToSelect\Type::make(Image::class)
                                ->titleAttribute('title')
                                ->label('Image'),
                            MorphToSelect\Type::make(Video::class)
                                ->titleAttribute('title')
                                ->label('Video'),
                        ]),
                ]),
        ];
    }
}
