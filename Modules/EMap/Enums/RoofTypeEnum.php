<?php

namespace Modules\EMap\Enums;

enum RoofTypeEnum: string
{
    case RCT = 'rct';
    case RBC = 'rbc';
    case TILE_ZINC = 'tile zinc';
    case OTHERS = 'others';
    public function label(): string
    {
        return self::getLabel($this);
    }
    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::RCT => 'आर.सि.सी',
            self::RBC => 'आर.वि.सी',
            self::TILE_ZINC => 'टायल,जस्ता',
            self::OTHERS => 'अन्य',

        };
    }
    public static function getValuesWithLabels(): array
    {
        $valuesWithLabels = [];

        foreach (self::cases() as $value) {
            $valuesWithLabels[] = [
                'value' => $value,
                'label' => $value->label(),
            ];
        }

        return $valuesWithLabels;
    }

}
