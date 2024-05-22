<?php

namespace Modules\EMap\Enums;

enum CheckerDocumentStatusEnum: string
{
    case MODIFY = 'modify';
    case SENT_TO_APPROVER = 'sent_to_approver';
    case SENT_TO_CHECKER = 'sent_to_checker';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::MODIFY => 'Modify',
            self::SENT_TO_APPROVER => 'Sent To Approver',
            self::SENT_TO_CHECKER => 'Sent To Checker',
        };
    }
}
