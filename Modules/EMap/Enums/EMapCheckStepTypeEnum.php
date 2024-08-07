<?php

namespace Modules\EMap\Enums;

enum EMapCheckStepTypeEnum: string
{
    case PLINTH_LEVEL = 'plinth level';
    case SUPERSTRUCTURE_LEVEL = 'superstructure level';
    case CERTIFICATE = 'certificate';

    public function label(): string
    {
        return self::getLabel($this);
    }



    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PLINTH_LEVEL => 'प्लिन्थ लेभल',
            self::SUPERSTRUCTURE_LEVEL => 'सुपरस्टर्कचर',
            self::CERTIFICATE => 'निर्माण सम्पन्न',

        };
    }



}
