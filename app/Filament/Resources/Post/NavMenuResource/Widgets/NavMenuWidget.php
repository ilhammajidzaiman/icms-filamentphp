<?php

namespace App\Filament\Resources\Post\NavMenuResource\Widgets;

use App\Models\Post\NavMenu;
use App\Services\Form\NavMenuFormService;
use SolutionForest\FilamentTree\Widgets\Tree as BaseWidget;

class NavMenuWidget extends BaseWidget
{
    protected static string $model = NavMenu::class;
    protected static int $maxDepth = 2;
    protected ?string $treeTitle = 'Nav Menu';
    protected bool $enableTreeTitle = false;

    protected function getFormSchema(): array
    {
        return NavMenuFormService::schema();
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
