<?php

namespace Modules\EMap\Enums;

enum MonthEnum: string
{
    case BAISAKH = '1';
    case JESTHA = '2';
    case ASHAD = '3';
    case SHRAWAN = '4';
    case BHADRA = '5';
    case ASHOJ = '6';
    case KARTIK = '7';
    case MANGSIR = '8';
    case POUSH = '9';
    case MAGH = '10';
    case FALGUN = '11';
    case CHAITRA = '12';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::BAISAKH => 'वैशाख',
            self::JESTHA => 'ज्येष्ठ',
            self::ASHAD => 'आषाढ़',
            self::SHRAWAN => 'श्रावण',
            self::BHADRA => 'भाद्र',
            self::ASHOJ => 'आश्विन',
            self::KARTIK => 'कार्तिक ',
            self::MANGSIR => 'मंसिर',
            self::POUSH => 'पौष',
            self::MAGH => 'माघ',
            self::FALGUN => 'फाल्गुण',
            self::CHAITRA => 'चैत्र',
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
