<?php

namespace Modules\Grant\Enums;

enum NewOrContinueEnum: string
{
    case NEW = 'new';
    case CONTINUE = 'continue';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::NEW => 'नँया',
            self::CONTINUE => 'निरन्तर',
        };
    }
}
