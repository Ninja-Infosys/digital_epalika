<?php

namespace Modules\Recommendation\Enums;

enum ApplicationTypeEnum: string
{
    case RELATIONSHIP_PROOF = 'relationship_proof';
    case CITIZENSHIP_RECOMMENDATION = 'citizenship_recommendation';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::RELATIONSHIP_PROOF => 'नाता प्रमाणित',
            self::CITIZENSHIP_RECOMMENDATION => 'नागरिता सिफारिस',
        };
    }
}
