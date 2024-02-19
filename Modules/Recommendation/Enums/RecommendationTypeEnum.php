<?php

namespace Modules\Recommendation\Enums;

enum RecommendationTypeEnum: string
{
    case FREE = 'free';
    case FEES = 'fees';
    case FREE_OF_CHARGE = 'free_of_charge';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::FREE => 'श:शुल्क/निशुल्क',
            self::FEES => 'श:शुल्क',
            self::FREE_OF_CHARGE => 'निशुल्क',
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
