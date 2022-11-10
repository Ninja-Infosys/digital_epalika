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
                'प्रयोजन' => '[@usage]',
                'वर्ग' => '[@building_category]',
                'स्ट्रकचर टाईप' => '[@structureType]',
                'हाल निर्माण गर्ने तल्ला संख्या' => '[@current_storey]',
                'भविष्यमा निर्माण गर्ने तल्ला संख्या' => '[@future_storey]',
                'प्लिन्थको क्षेत्रफल' => '[@area_of_plinth]',
                'कुल भवनको लम्बाई' => '[@length]',
                'कुल भवनको चौडाई' => '[@breadth]',
                'भवनको कुल उचाई जमिनको सतहबाट' => '[@height]',
//                'स्ट्रकचर टाईप' => '[@usage.consultant_signature]',
//                'स्ट्रकचर टाईप' => '[@usage.consultant_name]',
//                'स्ट्रकचर टाईप' => '[@usage.consultant_mobile_no]',
//                'स्ट्रकचर टाईप' => '[@usage.consultant_nec_no]',
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

        $replace = array_merge($this->getMapApplyReplacement(), $replace);
        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getMapApplyReplacement(): array
    {
        return [
            '[@registration_no]' => $this->registration_no ?? '',
            '[@registration_date]' => $this->registration_date ?? '',
            '[@construction_type]' => $this->construction_type?->label() ?? '',
            '[@usage]' => $this->usage?->label() ?? '',
            '[@building_category]' => $this->building_category?->label() ?? '',
            '[@structureType]' => $this->structureType->title ?? '',
            '[@current_storey]' => $this->current_storey ?? '',
            '[@future_storey]' => $this->future_storey ?? '',
            '[@area_of_plinth]' => $this->area_of_plinth ?? '',
            '[@length]' => $this->length ?? '',
            '[@breadth]' => $this->breadth ?? '',
            '[@height]' => $this->height ?? ''
        ];
    }
}
