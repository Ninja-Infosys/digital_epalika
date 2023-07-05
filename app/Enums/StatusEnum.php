<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PENDING = 'pending';
    case GIVEN = 'given';
    case APPROVE = 'approve';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PENDING => 'Pending',
            self::GIVEN => 'Given',
            self::APPROVE => 'Approve',
        };
    }
}
