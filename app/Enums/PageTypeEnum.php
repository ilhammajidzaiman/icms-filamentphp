<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PageTypeEnum: string implements HasLabel
{
    case SectionHome = 'section-home';
    case SectionPage = 'section-page';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::SectionHome => 'section-home',
            self::SectionPage => 'section-page',
        };
    }
}
