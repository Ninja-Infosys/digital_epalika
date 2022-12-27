<?php

namespace App\Enums;

enum BloodGroupEnum: string
{
    case O_POSITIVE = 'o+';
    case O_NEGATIVE = 'o-';
    case A_NEGATIVE = 'a-';
    case A_POSITIVE = 'a+';
    case B_POSITIVE = 'b+';
    case B_NEGATIVE = 'b-';
    case AB_POSITIVE = 'ab+';
    case AB_NEGATIVE = 'ab-';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::O_POSITIVE => 'O+',
            self::O_NEGATIVE => 'O-',
            self::A_NEGATIVE => 'A-',
            self::A_POSITIVE => 'A+',
            self::B_POSITIVE => 'B+',
            self::B_NEGATIVE => 'B-',
            self::AB_POSITIVE => 'AB+',
            self::AB_NEGATIVE => 'AB-',
        };
    }
}
