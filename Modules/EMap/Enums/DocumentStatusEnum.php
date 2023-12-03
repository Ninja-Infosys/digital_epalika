<?php

namespace Modules\EMap\Enums;

enum DocumentStatusEnum: string
{
    case PENDING = 'pending';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';
    case REVIEW = 'review';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PENDING => 'Pending',
            self::REJECTED => 'Rejected',
            self::APPROVED => 'Approved',
            self::REVIEW => 'Review',
        };
    }
}
