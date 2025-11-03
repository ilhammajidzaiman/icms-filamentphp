<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomeAccountWidget extends Widget
{
    protected string $view = 'filament-panels::widgets.account-widget';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;
}
