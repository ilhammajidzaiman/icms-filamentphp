<?php

namespace App\Filament\Pages\Auth;

use UnitEnum;
use BackedEnum;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Infolists\Concerns\InteractsWithInfolists;

class CustomeProfile extends Page
{
    use InteractsWithInfolists, InteractsWithSchemas;

    protected string $view = 'filament.pages.auth.custome-profile';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;
    protected static string | UnitEnum | null $navigationGroup = 'Administrasi';
    protected static ?string $modelLabel = 'Profil';
    protected static ?string $navigationLabel = 'Profil';
    protected static ?string $slug = 'profile';
    // protected static bool $shouldRegisterNavigation = false;
    // protected static ?int $navigationSort = 1;

    public User $record;

    public function mount(): void
    {
        $this->record = Auth::user();
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->record($this->record ?? null)
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        Fieldset::make(Str::title(__('profil')))
                            ->columnSpan(1)
                            ->schema([
                                ImageEntry::make('file')
                                    ->label(Str::title(__('profil')))
                                    ->defaultImageUrl(asset('/image/default-user.svg'))
                                    ->square()
                                    ->imageSize(200)
                                    ->inlineLabel()
                                    ->columnSpanFull(),
                                TextEntry::make('name')
                                    ->label(Str::title(__('nama')))
                                    ->inlineLabel()
                                    ->default('-')
                                    ->columnSpanFull(),
                                TextEntry::make('profile.gender')
                                    ->label(Str::title(__('jenis kelamin')))
                                    ->inlineLabel()
                                    ->default('-')
                                    ->columnSpanFull(),
                                TextEntry::make('profile.birth_date')
                                    ->label(Str::title(__('birth date')))
                                    ->inlineLabel()
                                    ->default('-')
                                    ->columnSpanFull(),
                            ]),
                        Fieldset::make(Str::title(__('akun')))
                            ->columnSpan(1)
                            ->schema([
                                TextEntry::make('username')
                                    ->label(Str::title(__('username')))
                                    ->inlineLabel()
                                    ->default('-')
                                    ->columnSpanFull(),
                                TextEntry::make('email')
                                    ->label(Str::title(__('email')))
                                    ->inlineLabel()
                                    ->default('-')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
