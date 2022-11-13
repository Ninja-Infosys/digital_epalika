<?php

namespace Modules\Grant\Enums;

enum GrantRecipientTypeEnum: string
{
    case FARMER = 'farmer';
    case FARMER_GROUP = 'farmer_group';
    case COOPERATIVE = 'cooperative';
    case ENTERPRISE = 'enterprise';
    case OTHER = 'other';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::FARMER => 'कृषक',
            self::FARMER_GROUP => 'कृषक समुह',
            self::COOPERATIVE => 'सहकारी',
            self::ENTERPRISE => 'उद्यम',
            self::OTHER => 'अन्य',
        };
    }
}
