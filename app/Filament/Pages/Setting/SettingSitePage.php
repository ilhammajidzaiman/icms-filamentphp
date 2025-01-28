<?php

namespace App\Filament\Pages\Setting;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use App\Models\Setting\SettingSite;
use Filament\Forms\Components\Grid;
use Filament\Support\Exceptions\Halt;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SettingSitePage extends Page implements HasForms
{
    use InteractsWithForms, HasPageShield, WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static string $view = 'filament.pages.setting.site';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $modelLabel = 'Site';
    protected static ?string $navigationLabel = 'Site';
    protected static ?string $slug = 'site';
    protected static ?int $navigationSort = 4;

    public $name,
        $email,
        $address,
        $phone,
        $map,
        $favicon,
        $logo,
        $social_media,
        $sosmed_name,
        $sosmed_url,
        $sosmed_icon,
        $sosmed_color;

    public function mount(): void
    {
        $this->form->fill(SettingSite::first()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Grid::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Informasi')
                            ->icon('heroicon-o-information-circle')
                            ->collapsible()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->label('Email')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('address')
                                    ->label('Alamat')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->label('No. Telpon/Hp')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('map')
                                    ->label('Peta Lokasi')
                                    ->helperText('Link embed hanya https:// ')
                                    ->required()
                                    ->maxLength(10240),
                                Repeater::make('social_media')
                                    ->label('Sosial Media')
                                    ->addActionLabel('Tambahkan Sosial Media')
                                    ->itemLabel(fn(array $state): ?string => $state['sosmed_name'] ?? null)
                                    ->collapsed()
                                    ->schema([
                                        TextInput::make('sosmed_name')
                                            ->label('Nama')
                                            ->live(onBlur: true)
                                            ->required(),
                                        Textarea::make('sosmed_url')
                                            ->label('Url')
                                            ->autosize()
                                            ->required(),
                                        TextInput::make('sosmed_icon')
                                            ->label('Icon')
                                            ->helperText('Gunakan icon Heroicons/Bootstrap/FontAwesome')
                                            ->placeholder('bi-instagram/fab-instagram')
                                            ->required(),
                                        TextInput::make('sosmed_color')
                                            ->label('Warna')
                                            ->helperText('Gunakan warna dari Tailwind/Bootstrap/Style sendiri')
                                            ->placeholder('primary/secondary/danger')
                                            ->required(),
                                    ])
                            ]),
                    ]),
                Grid::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Lampiran')
                            ->icon('heroicon-o-paper-clip')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('favicon')
                                    ->label('Favicon')
                                    ->maxSize(512)
                                    ->directory('site')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Ukuran maksimal: 512 kb, Rasio: 1:1'),
                                FileUpload::make('logo')
                                    ->label('Logo')
                                    ->maxSize(512)
                                    ->directory('site')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->downloadable()
                                    ->helperText('Ukuran maksimal: 512 kb, Extensi: png'),
                            ])
                    ]),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan')
                ->submit('save'),
        ];
    }

    public function save()
    {
        try {
            $data = $this->form->getState();
            SettingSite::first()->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Berhasil disimpan!')
            ->send();
    }
}
