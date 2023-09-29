<?php

namespace Modules\EMap\Enums;

enum EMapFormFillerTypeEnum: string
{
    case OWNER = 'owner';
    case ORGANIZATION = 'organization';
    case OFFICE = 'office';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::OWNER => 'घरधनी',
            self::ORGANIZATION => 'पालिका',
            self::OFFICE => 'परामर्शदाता/सुपरिवेकक्षक',
        };
    }
}
