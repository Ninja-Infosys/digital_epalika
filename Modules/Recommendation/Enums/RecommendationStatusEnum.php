<?php

namespace Modules\Recommendation\Enums;

enum RecommendationStatusEnum: string
{
    case PENDING = 'pending';
    case REJECT = 'reject';
    case SENT_TO_REVENUE = 'sent_to_revenue';
    case SENT_TO_APPROVER = 'sent_to_approver';

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
