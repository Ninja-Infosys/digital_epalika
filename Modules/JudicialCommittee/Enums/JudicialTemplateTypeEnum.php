<?php

namespace Modules\JudicialCommittee\Enums;

enum JudicialTemplateTypeEnum: string
{
    case DATE_SHEET = "date_sheet";

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::DATE_SHEET => 'तारिख पर्चा',
        };
    }
}
