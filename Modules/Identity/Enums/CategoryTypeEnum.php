<?php

namespace Modules\Identity\Enums;

enum CategoryTypeEnum: string
{
    case CATEGORY_A = 'A';
    case CATEGORY_B = 'B';
    case CATEGORY_C = 'C';
    case CATEGORY_D = 'D';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::CATEGORY_A => 'क',
            self::CATEGORY_B => 'ख',
            self::CATEGORY_C => 'ग',
            self::CATEGORY_D => 'घ',
        };
    }
}
