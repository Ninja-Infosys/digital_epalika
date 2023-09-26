<?php

namespace Modules\EMap\Enums;

enum FormTypeEnum: string
{
    case FILE = 'file';
    case FORM = 'form';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::FILE => 'फाइल',
            self::FORM => 'फारम',
        };
    }
}
