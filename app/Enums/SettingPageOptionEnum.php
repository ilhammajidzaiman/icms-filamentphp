<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SettingPageOptionEnum: string implements HasLabel
{
    case Carousel = 'carousel';
    case Headline = 'headline';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Carousel => 'Carousel',
            self::Headline => 'Headline',
        };
    }
}
