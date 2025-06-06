<?php

namespace App\Filament\Resources\Post;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Post\Link;
use App\Models\Post\Page;
use App\Models\Media\File;
use Filament\Tables\Table;
use App\Models\Media\Image;
use App\Models\Media\Video;
use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use App\Models\Post\NavMenu;
use App\Models\Post\BlogArticle;
use Filament\Resources\Resource;
use App\Models\Media\Information;
use App\Models\Post\BlogCategory;
use App\Models\Media\FileCategory;
use App\Services\Form\NavMenuForm;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Post\NavMenuResource\Pages;

class NavMenuResource extends Resource
{
    protected static ?string $model = NavMenu::class;
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $modelLabel = 'Nav Menu';
    protected static ?string $navigationLabel = 'Nav Menu';
    protected static ?string $slug = 'nav-menu';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(NavMenuForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label(Str::headline(__('no')))
                    ->rowIndex(isFromZero: false),
                TextColumn::make('title')
                    ->label(Str::headline(__('menu')))
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('type')
                    ->label(Str::headline(__('tipe')))
                    ->formatStateUsing(function (Model $record) {
                        $modelType = $record->modelable_type;
                        if ($modelType === BlogArticle::class):
                            return __('Article') ?? null;
                        elseif ($modelType === BlogCategory::class):
                            return __('Kategori') ?? null;
                        elseif ($modelType === BlogTag::class):
                            return __('Tag') ?? null;
                        elseif ($modelType === Page::class):
                            return __('Page') ?? null;
                        elseif ($modelType === Link::class):
                            return __('Link') ?? null;
                        elseif ($modelType === File::class):
                            return __('File') ?? null;
                        elseif ($modelType === FileCategory::class):
                            return __('File Categori') ?? null;
                        elseif ($modelType === Information::class):
                            return __('Informasi') ?? null;
                        elseif ($modelType === Image::class):
                            return __('Image') ?? null;
                        elseif ($modelType === Video::class):
                            return __('Video') ?? null;
                        endif;
                    })
                    ->default('-')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('ke')
                    ->label(Str::headline(__('judul')))
                    ->formatStateUsing(function (Model $record) {
                        $modelType = $record->modelable_type;
                        $modelId = $record->modelable_id;
                        if ($modelType === BlogArticle::class):
                            $record = BlogArticle::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === BlogCategory::class):
                            $record = BlogCategory::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === BlogTag::class):
                            $record = BlogTag::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === Page::class):
                            $record = Page::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === Link::class):
                            $record = Link::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === File::class):
                            $record = File::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === FileCategory::class):
                            $record = FileCategory::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === Information::class):
                            $record = Information::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === Image::class):
                            $record = Image::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        elseif ($modelType === Video::class):
                            $record = Video::where('id', $modelId)
                                ->first();
                            return $record->title ?? null;
                        endif;
                    })
                    ->default('-')
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
            'index' => Pages\ListNavMenus::route('/'),
            'create' => Pages\CreateNavMenu::route('/create'),
            'view' => Pages\ViewNavMenu::route('/{record}'),
            'edit' => Pages\EditNavMenu::route('/{record}/edit'),
            'tree-list' => Pages\NavMenuTree::route('/tree-list'),
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
