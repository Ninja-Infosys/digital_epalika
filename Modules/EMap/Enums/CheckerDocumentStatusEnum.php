<?php

namespace Modules\EMap\Enums;

enum CheckerDocumentStatusEnum: string
{
    case MODIFY = 'modify';
    case SENT_TO_APPROVER = 'sent_to_approver';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::MODIFY => 'Modify',
            self::SENT_TO_APPROVER => 'Sent To Approver',
        };
    }
}
