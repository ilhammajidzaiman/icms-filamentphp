<?php

namespace App\Services\Filament\Form;

use App\Models\Site\Page;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\MorphToSelect;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\MorphToSelect\Type;

class FilamentTreeFormService
{
    public static function schema(): array
    {
        return [
            Hidden::make('parent_id')
                ->required()
                ->default(-1)
                ->disabled()
                ->dehydrated(),
            Section::make(Str::title(__('form')))
                ->collapsible()
                ->columnSpanFull()
                ->schema([
                    Toggle::make('is_show')
                        ->label(Str::title(__('status')))
                        ->default(true),
                    TextInput::make('order')
                        ->label(Str::title(__('urutan')))
                        ->required()
                        ->numeric()
                        ->default(0),
                    Textinput::make('title')
                        ->label(Str::title(__('judul')))
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->maxLength(1024),
                    TextInput::make('slug')
                        ->label(Str::title(__('slug')))
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(1024),
                    MorphToSelect::make('modelable')
                        ->label(Str::title(__('arahkan ke')))
                        ->required()
                        ->native(false)
                        ->searchable()
                        ->preload()
                        ->types([
                            Type::make(BlogCategory::class)
                                ->titleAttribute('title')
                                ->label(Str::title(__('kategori')))
                                ->getOptionLabelFromRecordUsing(fn(Model $record) => "[{$record->created_at}] {$record->title}"),
                            Type::make(BlogArticle::class)
                                ->titleAttribute('title')
                                ->label(Str::title(__('artikel')))
                                ->getOptionLabelFromRecordUsing(fn(Model $record) => "[{$record->published_at}] {$record->title}"),
                            Type::make(Page::class)
                                ->titleAttribute('title')
                                ->label(Str::title(__('halaman')))
                                ->getOptionLabelFromRecordUsing(fn(Model $record) => "[{$record->created_at}] {$record->title}"),
                        ]),
                ]),
        ];
    }
}
