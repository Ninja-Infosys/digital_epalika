<?php

namespace Modules\EMap\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\EMap\Entities\EMapTemplate;

trait EMapTemplateTrait
{
    private array $template = [
        [
            'title' => 'विवरण',
            'data' => [
                'दर्ता नम्बर' => '[@registration_no]',
                'दर्ता मिति' => '[@registration_date]',
                'निर्माण कार्यको किसिम' => '[@construction_type]',
                'प्रयोजन' => '[@usage.district]'
            ],
        ],

    ];


    public function getTemplateDataAttribute(): Collection
    {

        return EMapTemplate::get()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);
            return [
                'for' => $applicationTemplate->for,
                'data' => $data
            ];
        });
    }

    public function getSpecificTemplateData($type): string
    {

        $businessTemplate = EMapTemplate::where('for', $type)->first();
        return $this->getData($businessTemplate->data);
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }

    private function getData($data): string
    {
        $replace = [];

        $replace = array_merge($this->getMapApplyReplacement());
        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getMapApplyReplacement(): array
    {
        return [
            '[@registration_no]' => $this->registration_no ?? '',
            '[@registration_date]' => $this->registration_date ?? '',
            '[@construction_type]' => $this->construction_type->label()??'',
        ];
    }
}
