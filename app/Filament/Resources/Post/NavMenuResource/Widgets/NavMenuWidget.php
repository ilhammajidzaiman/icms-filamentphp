<?php

namespace App\Filament\Resources\Post\NavMenuResource\Widgets;

use Filament\Forms\Set;
use App\Models\Post\Link;
use App\Models\Post\Page;
use App\Models\Media\File;
use App\Models\Media\Image;
use App\Models\Media\Video;
use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use App\Models\Post\NavMenu;
use App\Models\Post\BlogArticle;
use App\Models\Media\Information;
use App\Models\Post\BlogCategory;
use App\Models\Media\FileCategory;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MorphToSelect;
use SolutionForest\FilamentTree\Widgets\Tree as BaseWidget;

class NavMenuWidget extends BaseWidget
{
    protected static string $model = NavMenu::class;
    protected static int $maxDepth = 2;
    protected ?string $treeTitle = 'Nav Menu';
    protected bool $enableTreeTitle = false;

    protected function getFormSchema(): array
    {
        return [
            Hidden::make('user_id')
                ->required()
                ->default(auth()->user()->id)
                ->disabled()
                ->dehydrated(),
            Hidden::make('parent_id')
                ->required()
                ->default(-1)
                ->disabled()
                ->dehydrated(),
            Hidden::make('order')
                ->required()
                ->default(0)
                ->disabled()
                ->dehydrated(),
            Section::make()
                ->schema([
                    Toggle::make('is_show')
                        ->label('Status')
                        ->required()
                        ->default(true),
                    TextInput::make('title')
                        ->label('Judul')
                        ->helperText('Maksimal: 50 karakter.')
                        ->required()
                        ->maxLength(50)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->helperText('Slug akan otomatis dihasilkan dari judul.')
                        ->required()
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(255),
                ]),
            MorphToSelect::make('modelable')
                ->label('Arahkan Ke')
                ->required()
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
                ])
        ];
    }

    protected function hasDeleteAction(): bool
    {
        return true;
    }
    protected function hasEditAction(): bool
    {
        return true;
    }
    protected function hasViewAction(): bool
    {
        return true;
    }
}
