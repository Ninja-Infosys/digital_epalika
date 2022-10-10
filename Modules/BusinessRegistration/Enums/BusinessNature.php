<?php

namespace Modules\BusinessRegistration\Enums;

enum BusinessNature: string
{
    case SINGLE = 'single';
    case PARTNERSHIP = 'partnership';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::SINGLE => 'एकल',
            self::PARTNERSHIP => 'साझेदारी',
        };
    }
}
