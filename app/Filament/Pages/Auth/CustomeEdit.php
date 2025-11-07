<?php

namespace App\Filament\Pages\Auth;

use App\Enums\GenderEnum;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Fieldset;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;

class CustomeEdit extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make(Str::title(__('akun')))
                    ->schema([
                        $this->getNameFormComponent()
                            ->label(Str::title(__('nama')))
                            ->columnSpanFull(),
                        $this->getEmailFormComponent()
                            ->label(Str::title(__('email')))
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        TextInput::make('username')
                            ->label(Str::title(__('username')))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        $this->getPasswordFormComponent()
                            ->columnSpanFull(),
                        $this->getPasswordConfirmationFormComponent()
                            ->columnSpanFull(),
                    ]),
                Fieldset::make(Str::title(__('profil')))
                    ->relationship('profile')
                    ->schema([
                        Radio::make('gender')
                            ->label(Str::title(__('jenis kelamin')))
                            ->required()
                            ->inline()
                            ->inlineLabel(false)
                            ->default(GenderEnum::Male->value)
                            ->options(GenderEnum::class)
                            ->columnSpanFull(),
                        DatePicker::make('birth_date')
                            ->label(Str::title(__('tanggal lahir')))
                            ->required()
                            ->default(now())
                            ->columnSpanFull(),
                        TextInput::make('phone')
                            ->label(Str::title(__('nomor hp/wa')))
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->numeric()
                            ->tel()
                            ->regex('/^[0-9]{1,20}$/')
                            ->minLength(8)
                            ->maxLength(20)
                            ->columnSpanFull(),
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('max: 1 mb. rasio: 1:1')))
                            ->directory('user/' . date('Y/m'))
                            // ->optimize('webp')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1:1'])
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
