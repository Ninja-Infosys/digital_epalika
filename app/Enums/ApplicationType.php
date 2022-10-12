<?php

namespace App\Enums;

enum  ApplicationType: string
{
    case MALE = 'male';

    public function label(): string {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            self::MALE => 'पुरुष',
        };
    }
}
