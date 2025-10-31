<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SettingPageSectionEnum: string implements HasLabel
{
    case SectionHome = 'section-home';
    case SectionPage = 'section-page';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SectionHome => 'Section Home',
            self::SectionPage => 'Section Page',
        };
    }
}
