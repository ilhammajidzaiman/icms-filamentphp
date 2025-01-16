<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Tables;
use App\Enums\RoleEnum;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Enums\GenderEnum;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $modelLabel = 'User';
    protected static ?string $navigationLabel = 'User';
    protected static ?string $slug = 'user';
    protected static ?int $navigationSort = 3;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Account')
                            ->icon('heroicon-o-user')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $set('username', $state);
                                        $set('email', Str::lower(Str::replace(' ', '', $state)) . '@gmail.com');
                                    })
                                    ->maxLength(255),
                                TextInput::make('username')
                                    ->label('Username')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->revealable()
                                    ->maxLength(255)
                                    ->dehydrated(fn(?string $state): bool => filled($state))
                                    ->required(fn(string $operation): bool => $operation === 'create')
                                    ->live(onBlur: true),
                                TextInput::make('confirmation')
                                    ->label('Konfirmasi Password')
                                    ->same('password')
                                    ->revealable()
                                    ->password()
                                    ->required(fn(string $operation): bool => $operation === 'create')
                                    ->visible(fn(Get $get): bool => filled($get('password')))
                                    ->maxLength(255),
                                Select::make('roles')
                                    ->label('Level')
                                    ->required()
                                    ->native(false)
                                    ->preload()
                                    ->relationship(
                                        name: 'roles',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: static function (Builder $query) {
                                            return $query
                                                ->when(
                                                    auth()->user()->hasAnyRole(RoleEnum::SuperAdmin),
                                                    function ($query) {
                                                        return $query;
                                                    }
                                                )
                                                ->when(
                                                    auth()->user()->hasAnyRole(RoleEnum::Admin),
                                                    function ($query) {
                                                        return $query->where('name', RoleEnum::User);
                                                    }
                                                )
                                                ->when(
                                                    auth()->user()->hasAnyRole(RoleEnum::User),
                                                    function ($query) {
                                                        return $query->where('name', RoleEnum::User);
                                                    }
                                                );
                                        },
                                    ),
                            ]),
                    ]),
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Profil')
                            ->icon('heroicon-o-user-circle')
                            ->relationship('profile')
                            ->schema([
                                Radio::make('gender')
                                    ->label('Jenis Kelamin')
                                    ->required()
                                    ->inline()
                                    ->inlineLabel(false)
                                    ->default(GenderEnum::Male->value)
                                    ->options(GenderEnum::class),
                                DatePicker::make('birth_date')
                                    ->label('Tanggal Lahir')
                                    ->required()
                                    ->default(now()),
                                FileUpload::make('file')
                                    ->label('File')
                                    ->helperText('Ukuran maksimal: 1 MB. Rasio: 1:1')
                                    ->directory('user/' . date('Y/m'))
                                    ->optimize('webp')
                                    ->image()
                                    ->imageEditor()
                                    ->downloadable()
                                    ->openable()
                                    ->required()
                                    ->maxSize(1024),
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
                ImageColumn::make('profile.file')
                    ->label('File')
                    ->defaultImageUrl(asset('/image/default-user.svg'))
                    ->circular()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('username')
                    ->label('Username')
                    ->copyable()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('roles.name')
                    ->label('Peran')
                    ->default('-')
                    ->badge()
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
