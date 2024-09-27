<?php

namespace App\Filament\Resources\Post\NavMenuResource\Widgets;

use Filament\Forms\Set;
use App\Models\Post\Link;
use App\Models\Post\Page;
use Illuminate\Support\Str;
use App\Models\Post\NavMenu;
use App\Models\Post\BlogArticle;
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
                        ->required()
                        ->maxLength(50)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->helperText('Maksimal: 50 karakter.'),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->disabled()
                        ->dehydrated()
                        ->helperText('Slug akan otomatis dihasilkan dari judul.'),
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
                    MorphToSelect\Type::make(Page::class)
                        ->titleAttribute('title')
                        ->label('Halaman'),
                    MorphToSelect\Type::make(Link::class)
                        ->titleAttribute('title')
                        ->label('Link'),
                ])
        ];
    }

    // INFOLIST, CAN DELETE
    public function getViewFormSchema(): array
    {
        return [
            //
        ];
    }

    // CUSTOMIZE ICON OF EACH RECORD, CAN DELETE
    // public function getTreeRecordIcon(?\Illuminate\Database\Eloquent\Model $record = null): ?string
    // {
    //     return null;
    // }

    // CUSTOMIZE ACTION OF EACH RECORD, CAN DELETE 
    // protected function getTreeActions(): array
    // {
    //     return [
    //         Action::make('helloWorld')
    //             ->action(function () {
    //                 Notification::make()->success()->title('Hello World')->send();
    //             }),
    //         // ViewAction::make(),
    //         // EditAction::make(),
    //         ActionGroup::make([
    //             
    //             ViewAction::make(),
    //             EditAction::make(),
    //         ]),
    //         DeleteAction::make(),
    //     ];
    // }
    // OR OVERRIDE FOLLOWING METHODS
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
