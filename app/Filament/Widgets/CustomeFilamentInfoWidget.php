<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CustomeFilamentInfoWidget extends Widget
{
    protected string $view = 'filament-panels::widgets.filament-info-widget';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
}
