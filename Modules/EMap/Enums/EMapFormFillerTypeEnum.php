<?php

namespace Modules\EMap\Enums;

enum EMapFormFillerTypeEnum: string
{
    case HOUSE_OWNER = 'house_owner';
    case MUNICIPAL = 'municipal';
    case CONSULTANT = 'consultant';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::HOUSE_OWNER => 'घरधनी',
            self::MUNICIPAL => 'पालिका',
            self::CONSULTANT => 'परामर्शदाता/सुपरिवेकक्षक',
        };
    }
}
