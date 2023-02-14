<?php

namespace Modules\JudicialCommittee\Enums;

enum JudicialTemplateTypeEnum: string
{
    case COMPLAINANT_APPLICATION = 'complainant_application';
    case DEFENDANT_APPLICATION = 'defendant_application';
    case JUDICIAL_RECEIPT_BILL = "judicial_receipt_bill";
    case DEFENDANT_APPLICATION_IDENTIFICATION = "defendant_application_identification";
    case DATE_SHEET = "date_sheet";
    case DEFENDANT_ISSUED_DEADLINE = "defendant_issued_deadline";
    case DATE_COMPENSATION = "date_compensation";

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::DATE_SHEET => 'तारिख पर्चा',
            self::DEFENDANT_ISSUED_DEADLINE => 'प्रतिवादी म्याद जारी',
            self::DATE_COMPENSATION => 'तारिख भरपाई',
            self::JUDICIAL_RECEIPT_BILL => 'निस्सा सनाखत',
            self::DEFENDANT_APPLICATION_IDENTIFICATION=>'प्रतिवादी निस्सा सनाखत',
            self::COMPLAINANT_APPLICATION => 'वादी दर्ता नालेस',
            self::DEFENDANT_APPLICATION => 'प्रतिवादी दर्ता नालेस',
        };
    }
}
