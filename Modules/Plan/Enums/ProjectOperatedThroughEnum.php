<?php

namespace Modules\Plan\Enums;

enum ProjectOperatedThroughEnum: string
{
    case CONSUMER_COMMITTEE = 'consumer_committee';
    case BID = 'bid';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::CONSUMER_COMMITTEE => 'उपभोक्ता समिति',
            self::BID => 'बोलपत्र(टेन्डर)'
        };
    }
}
