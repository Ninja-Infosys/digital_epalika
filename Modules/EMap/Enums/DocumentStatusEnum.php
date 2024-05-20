<?php

namespace Modules\EMap\Enums;

enum DocumentStatusEnum: string
{
    case PENDING = 'pending';
    case MODIFY = 'modify';
    case APPROVED = 'approved';
    case REVIEW = 'review';
    case NOT_APPLIED = 'not-applied';
    case SENT_TO_CHECKER = 'sent-to-checker';
    case SENT_TO_APPROVER = 'sent-to-approver';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public function specificLabel(): ?string
    {
        return in_array($this, self::getSpecificStatuses(), true) ? $this->label() : null;
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PENDING => 'Pending',
            self::MODIFY => 'Modify',
            self::APPROVED => 'Approved',
            self::REVIEW => 'Review',
            self::NOT_APPLIED => 'Not Applied',
            self::SENT_TO_CHECKER => 'Sent To Checker',
            self::SENT_TO_APPROVER => 'Sent To Approver',
        };
    }


    public static function getSpecificStatuses(): array
    {
        return [
            self::SENT_TO_APPROVER,
            self::MODIFY,
        ];
    }
}
