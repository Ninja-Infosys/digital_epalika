<?php

namespace Modules\BusinessRegistration\Enums;

enum ForumTypeEnum: string
{
    case PERSONAL = 'personal';
    case PARTNERSHIP = 'partnership';

    public function label(): string
    {
        return self::getLabel($this);
    }
    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PERSONAL => 'व्यक्तिगत',
            self::PARTNERSHIP => 'साझेदारी',
        };
    }
}
