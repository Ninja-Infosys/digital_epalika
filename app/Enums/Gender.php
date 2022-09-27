<?php

namespace App\Enums;

enum  Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';

    public function label(): string {
        return Gender::getLabel($this);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            Gender::MALE => 'पुरुष',
            Gender::FEMALE => 'महिला',
            Gender::OTHER => 'अन्य',
        };
    }
}
