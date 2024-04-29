<?php

namespace Modules\Recommendation\Enums;

enum RecommendationStatusEnum: string
{
    case PENDING = '1';
    case SENT_TO_REVENUE = '2';
    case SENT_TO_APPROVER = '3';
    case COMPLETED = '4';
    case REJECT = '5';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::PENDING => 'पेन्डीङ',
            self::REJECT => 'रिजेक्ट',
            self::SENT_TO_REVENUE => 'राजस्वमा पठाउनु होस्',
            self::SENT_TO_APPROVER => 'स्वीकृतिको लागि पठाउनु होस्',
            self::COMPLETED => 'सम्पन्न',
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
