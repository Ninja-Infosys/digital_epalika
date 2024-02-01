<?php

namespace Modules\EMap\Enums;

enum EMapFormFillerTypeEnum: string
{
    case OWNER = 'owner';
    case ORGANIZATION = 'organization';
    case OFFICE = 'office';
    case WARD = 'ward';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::OWNER => 'घरधनी',
            self::ORGANIZATION => 'परामर्शदाता/सुपरिवेकक्षक',
            self::OFFICE => 'पालिका',
            self::WARD => 'वडा'
        };
    }
}
