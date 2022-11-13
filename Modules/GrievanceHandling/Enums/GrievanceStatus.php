<?php

namespace Modules\GrievanceHandling\Enums;

enum GrievanceStatus: string
{
    case UNSEEN = 'unseen';
    case INVESTIGATED = 'investigated';
    case REPLIED = 'replied';
    case CLOSED = 'closed';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::UNSEEN => 'नहेरिएको',
            self::INVESTIGATED => 'अनुसन्धान गरिदै',
            self::REPLIED => 'जवाफ दिनुभयो',
            self::CLOSED => 'बन्द',
        };
    }
}
