<?php

namespace Modules\BusinessRegistration\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\BusinessRegistrationTemplate;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

trait ProprietorTemplateTrait
{
    protected array $template = [
        [
            'title'=>'प्रोपराइटर',
            'data' => [
                'नाम' => '[@name]',
                'नागरिकता नम्बर' => '[@citizenship_no]',
                'जारी मिति' => '[@issue_date]',
                'जारी जिल्ला' => '[@issueDistrict.district]',
                'फोन नं' => '[@phone]',
                'इमेल' => '[@email]',
                'प्रदेश' => '[@province.province]',
                'जिल्ला' => '[@district.district]',
                'पालिका' => '[@localBody.local_body]',
                'वार्ड' => '[@ward_no]',
                'मार्ग' => '[@way]',
                'गाउ/टोल' => '[@tole]',
                'घर नम्बर' => '[@house_no]',
                'व्यक्तिगत स्थाई लेखा नम्बर' => '[@account_no]',
                'राष्ट्रियता परिचयपत्र नम्बर' => '[@national_card_no]',
                'लिङ्ग' => '[@gender]',
                'शैक्षिक योग्यता ' => '[@education_qualification]',
                'मुख्य पेशा ' => '[@occupation]',
            ],
        ],
        [
            'title'=>'व्यवसाय विवरण',
            'data' => [
                'price',
                'business_nature',
                'business_detail_name',
                'business_detail_name_en',
                'investment_revenue_id',
                'business_nature_id',
                'establish_year',
                'registration_date',
                'pan_no',
                'amount_cost',
                'source_of_capital',
                'purpose',
                'employment',
                'house_owner_name',
                'house_owner_phone',
                'house_owner_address',
                'house_owner_monthly_rent',
                'province_id',
                'district_id',
                'local_body_id',
                'ward_no',
                'way',
                'tole',
                'submission_no',
                'is_registered',
                'is_rent',
                'fiscal_year_id',
                'registration_no',
                'registration_date_ne',
                'registration_date_en',
            ],
        ],
        [
            'title'=>'परिचय पार्टी',
            'data' => [
                'length',
                'width',
                'square',
            ],
        ],

    ];

    private ProprietorDetail $proprietorDetail;


    public function getTemplateDataAttribute(): Collection
    {
//        dd($this);
        return BusinessRegistrationTemplate::get()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);
            return [
                'for' => $applicationTemplate->for,
                'data' => $data
            ];
        });
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }


    public function getData($data): string
    {
        $data = Str::replace('[@name]', $this->attributes['name'] ?? '', $data);
        $data = Str::replace('[@citizenship_no]', $this->attributes['citizenship_no'] ?? '', $data);
        $data = Str::replace('[@issue_date]', $this->issueDistrict->district ?? '', $data);
        $data = Str::replace('[@issueDistrict.district]', $this->attributes['name'] ?? '', $data);
        $data = Str::replace('[@phone]', $this->attributes['phone'] ?? '', $data);
        $data = Str::replace('[@email]', $this->attributes['email'] ?? '', $data);
        $data = Str::replace('[@province.province]', $this->province->province ?? '', $data);
        $data = Str::replace('[@district.district]', $this->district->district ?? '', $data);
        $data = Str::replace('[@localBody.local_body]', $this->localBody->local_body ?? '', $data);
        $data = Str::replace('[@ward_no]', $this->attributes['ward_no'] ?? '', $data);
        $data = Str::replace('[@way]', $this->attributes['way'] ?? '', $data);
        $data = Str::replace('[@tole]', $this->attributes['tole'] ?? '', $data);
        $data = Str::replace('[@house_no]', $this->attributes['house_no'] ?? '', $data);
        $data = Str::replace('[@account_no]', $this->attributes['account_no'] ?? '', $data);
        $data = Str::replace('[@national_card_no]', $this->attributes['national_card_no'] ?? '', $data);
        $data = Str::replace('[@gender]', $this->attributes['gender'] ?? '', $data);
        $data = Str::replace('[@education_qualification]', $this->attributes['education_qualification'] ?? '', $data);
        $data = Str::replace('[@occupation]', $this->attributes['occupation'] ?? '', $data);
        return $data;
    }
}
