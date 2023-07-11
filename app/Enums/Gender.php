<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::MALE => 'पुरुष',
            self::FEMALE => 'महिला',
            self::OTHER => 'अन्य',
        };
    }
    public function labelEn(): string
    {
        return self::getLabelEn($this);
    }

    public static function getLabelEn(self $value): string
    {
        return match ($value) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::OTHER => 'Other',
        };
    }
}
