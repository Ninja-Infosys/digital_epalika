<?php

namespace Modules\EMap\Enums;

enum StoreyTypeEnum: string
{
    case BASEMENT = 'basement';
    case GROUND_FLOOR = 'ground floor';
    case FIRST_FLOOR = 'first floor';
    case SECOND_FLOOR = 'second floor';
    case THIRD_FLOOR = 'third floor';
    case FOUR_FLOOR = 'four floor';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::BASEMENT => 'बेसमेन्ट',
            self::GROUND_FLOOR => 'जमिन तला',
            self::FIRST_FLOOR => 'पहिलो तला',
            self::SECOND_FLOOR => 'दोस्रो तला',
            self::THIRD_FLOOR => 'तेस्रो तला',
            self::FOUR_FLOOR => 'चौथो तला',
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
