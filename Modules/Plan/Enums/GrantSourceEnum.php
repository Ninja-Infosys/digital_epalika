<?php

namespace Modules\Plan\Enums;

enum GrantSourceEnum: string
{
    case DESIGNER = 'designer';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::DESIGNER => 'डिजाइनर',
        };
    }
}
