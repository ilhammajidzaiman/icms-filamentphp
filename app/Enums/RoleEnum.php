<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum RoleEnum: string implements HasLabel, HasColor, HasIcon
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case User = 'user';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Admin => 'Admin',
            self::User => 'user',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SuperAdmin => 'primary',
            self::Admin => 'success',
            self::User => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SuperAdmin => 'heroicon-o-danger',
            self::Admin => 'heroicon-o-danger',
            self::User => 'heroicon-o-success',
        };
    }
}
