<?php

namespace App\Filament\Resources\Setting\NavigationMenus\Widgets;

use App\Models\Setting\NavigationMenu;
use SolutionForest\FilamentTree\Widgets\Tree;
use SolutionForest\FilamentTree\Actions\EditAction;
use SolutionForest\FilamentTree\Actions\ViewAction;
use SolutionForest\FilamentTree\Actions\ActionGroup;
use SolutionForest\FilamentTree\Actions\DeleteAction;
use App\Services\Filament\Form\FilamentTreeFormService;

class FilamentTreeWidget extends Tree
{
    protected static string $model = NavigationMenu::class;
    protected static int $maxDepth = 2;
    protected ?string $treeTitle = 'Tree Widget';
    protected bool $enableTreeTitle = true;

    protected function getFormSchema(): array
    {
        return FilamentTreeFormService::schema();
    }

    protected function getTreeToolbarActions(): array
    {
        return [
            \SolutionForest\FilamentTree\Actions\CreateAction::make(),
        ];
    }

    protected function getTreeActions(): array
    {
        return [
            ActionGroup::make([
                ViewAction::make()->color('secondary'),
                EditAction::make()->color('success'),
                DeleteAction::make()->color('danger'),
            ]),
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
