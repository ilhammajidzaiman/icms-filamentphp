<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\RoleEnum;
use App\Enums\GenderEnum;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make(Str::title(__('account')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        TextInput::make('name')
                            ->label(Str::title(__('nama')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('username', $state);
                                $set('email', Str::lower(Str::replace(' ', '', $state)) . '@gmail.com');
                            })
                            ->maxLength(255),
                        TextInput::make('username')
                            ->label(Str::title(__('username')))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(Str::title(__('email')))
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('password')
                            ->label(Str::title(__('password')))
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->dehydrated(fn(?string $state): bool => filled($state))
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->live(onBlur: true),
                        TextInput::make('confirmation')
                            ->label(Str::title(__('konfirmasi password')))
                            ->same('password')
                            ->revealable()
                            ->password()
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->visible(fn(Get $get): bool => filled($get('password')))
                            ->maxLength(255),
                        // Select::make('roles')
                        //     ->label(Str::title(__('level')))
                        //     ->required()
                        //     ->native(false)
                        //     ->preload()
                        //     ->relationship(
                        //         name: 'roles',
                        //         titleAttribute: 'name',
                        //         modifyQueryUsing: static function (Builder $query) {
                        //             return $query
                        //                 ->when(
                        //                     auth()->user()->hasAnyRole(RoleEnum::SuperAdmin),
                        //                     function ($query) {
                        //                         return $query;
                        //                     }
                        //                 )
                        //                 ->when(
                        //                     auth()->user()->hasAnyRole(RoleEnum::Admin),
                        //                     function ($query) {
                        //                         return $query->where('name', RoleEnum::User);
                        //                     }
                        //                 )
                        //                 ->when(
                        //                     auth()->user()->hasAnyRole(RoleEnum::User),
                        //                     function ($query) {
                        //                         return $query->where('name', RoleEnum::User);
                        //                     }
                        //                 );
                        //         },
                        //     ),
                    ]),
                Section::make(Str::title(__('Profil')))
                    ->relationship('profile')
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        Radio::make('gender')
                            ->label(Str::title(__('jenis kelamin')))
                            ->required()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(GenderEnum::Male->value)
                            ->options(GenderEnum::class),
                        DatePicker::make('birth_date')
                            ->label(Str::title(__('tanggal lahir')))
                            ->required()
                            ->default(now()),
                        TextInput::make('phone')
                            ->label(Str::title(__('nomor hp/wa')))
                            ->helperText(Str::title(__('masukkan nomor hp/wa aktif Anda, contoh: 81234567890.')))
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->tel()
                            ->prefix('+62')
                            ->regex('/^[0-9]{1,20}$/')
                            ->minLength(8)
                            ->maxLength(20),
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('ukuran maksimal: 1 MB. rasio: 1:1')))
                            ->directory('user/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->downloadable()
                            ->openable()
                            ->maxSize(1024),
                    ])
            ]);
    }
}
