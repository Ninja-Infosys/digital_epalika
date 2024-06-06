<?php

namespace Modules\EMap\Enums;

enum BuildingDocumentationStatusEnum: string
{
    case NOTICE = 'notice';
    case LAND_CONFIRMATION = 'land confirmation';
    case RECOMMENDATION = 'recommendation';
    case REPORT = 'report';
    case CERTIFICATE = 'certificate';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::NOTICE => 'सुचना टाँस',
            self::LAND_CONFIRMATION => 'सर्जमिन मुचुल्का',
            self::RECOMMENDATION => 'वडा सिफारिस',
            self::REPORT => 'प्राविधिक प्रतिबेदन',
            self::CERTIFICATE => 'प्रमाणपत्र',
        };
    }
}
