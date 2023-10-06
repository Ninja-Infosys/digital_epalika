<?php

namespace Modules\EMap\Enums;

use Modules\EMap\Entities\DynamicForm;
use Modules\EMap\Entities\EMapTemplate;

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

    public function class(): string
    {
        return self::getClass($this);
    }

    public static function getClass(self $value): string
    {
        return match ($value) {
            self::FILE => new EMapTemplate(),
            self::FORM => new DynamicForm(),
        };
    }
}
