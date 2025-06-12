<?php

namespace App\Filament\Resources\Media;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Media\Carousel;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Media\CarouselResource\Pages;

class CarouselResource extends Resource
{
    protected static ?string $model = Carousel::class;
    protected static ?string $navigationIcon = 'heroicon-o-tv';
    protected static ?string $navigationGroup = 'Media';
    protected static ?string $modelLabel = 'Carousel';
    protected static ?string $navigationLabel = 'Carousel';
    protected static ?string $slug = 'carousel';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                Section::make(Str::headline(__('rincian')))
                    ->icon('heroicon-o-information-circle')
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::headline(__('status')))
                            ->default(true),
                        Textarea::make('title')
                            ->label(Str::headline(__('judul')))
                            ->autosize()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::headline(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        Textarea::make('description')
                            ->label(Str::headline(__('deskripsi')))
                            ->autosize()
                            ->maxLength(1024),
                    ]),
                Section::make(Str::headline(__('lampiran')))
                    ->icon('heroicon-o-paper-clip')
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::headline(__('file')))
                            ->helperText(Str::ucfirst(__('ukuran maksimal: 10 MB.')))
                            ->directory('carousel-file/' . date('Y/m'))
                            ->optimize('webp')
                            ->required()
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
            'index' => Pages\Listcarousels::route('/'),
            'create' => Pages\CreateCarousel::route('/create'),
            'view' => Pages\ViewCarousel::route('/{record}'),
            'edit' => Pages\EditCarousel::route('/{record}/edit'),
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
