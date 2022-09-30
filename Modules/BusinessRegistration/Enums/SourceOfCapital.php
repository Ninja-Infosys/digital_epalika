<?php

namespace Modules\BusinessRegistration\Enums;

enum SourceOfCapital: string
{
    case ANCESTRALPROPERTY = 'ancestral property';
    case BUSINESS = 'business';
    case SALARY = 'salary';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::ANCESTRALPROPERTY => 'पैतृक सम्पति',
            self::BUSINESS  => 'ब्यापार व्यवसाय',
            self::SALARY  => 'तलब',
        };
    }
}
