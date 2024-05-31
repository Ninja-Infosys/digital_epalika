<?php

namespace Modules\EMap\Enums;

enum BuildingTypeEnum: string
{
    case CONCRETE_HOUSE = 'concrete house';
    case SIMPLE_BUILDING = 'simple building';
    case SIMPLE_HOUSE = 'simple house';
    case MUD_HOUSE = 'mud house';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::CONCRETE_HOUSE => 'पक्कि घर',
            self::SIMPLE_BUILDING => 'साधारण भवन',
            self::SIMPLE_HOUSE => 'साधारण घर',
            self::MUD_HOUSE => 'कच्ची घर',
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
