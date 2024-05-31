<?php

namespace Modules\EMap\Enums;

enum NeighbourTypeEnum: string
{
    case EAST = 'east';
    case WEST = 'west';
    case NORTH = 'north';
    case SOUTH = 'south';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::EAST => 'पूर्व',
            self::WEST => 'पश्चिम',
            self::NORTH => 'उत्तर',
            self::SOUTH => 'दक्षिण',
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
