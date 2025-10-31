<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SettingSiteOptionEnum: string implements HasLabel
{
    case SiteName = 'site-name';
    case SiteFavicon = 'site-favicon';
    case SiteLogo = 'site-logo';
    case SiteTagline = 'site-tagline';
    case SiteEmail = 'site-email';
    case SiteAddress = 'site-address';
    case SitePhone = 'site-phone';
    case SiteMap = 'site-map';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SiteName => 'Site Name',
            self::SiteFavicon => 'Site Favicon',
            self::SiteLogo => 'Site Logo',
            self::SiteTagline => 'Site Tagline',
            self::SiteEmail => 'Site Email',
            self::SiteAddress => 'Site Address',
            self::SitePhone => 'Site Phone',
            self::SiteMap => 'Site Map',
        };
    }
}
