<?php

namespace Modules\EMap\Enums;

enum MapStatusEnum: string
{
    case ACCEPT = 'Accept';
    case REJECT = 'Reject';
    case COMPLETE = 'Complete';
    case UNSEEN = 'Unseen';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::ACCEPT => 'स्वीकृत नक्सा',
            self::REJECT => 'अस्वीकृत नक्सा',
            self::COMPLETE => 'कार्य सम्पन्न भएका',
            self::UNSEEN => 'प्रक्रियामा रहेका',
        };
    }

    public static function getAllValues()
    {
        $values = collect();

        foreach (self::cases() as $value) {
            $values->push($value->value);
        }

        return $values;
    }

}
