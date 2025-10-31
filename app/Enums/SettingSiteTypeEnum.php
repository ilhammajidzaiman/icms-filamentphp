<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SettingSiteTypeEnum: string implements HasLabel
{
    case Text = 'text';
    case File = 'file';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Text => 'Text',
            self::File => 'File',
        };
    }
}
