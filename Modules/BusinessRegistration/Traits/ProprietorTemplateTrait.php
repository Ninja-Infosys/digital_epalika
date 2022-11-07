<?php

namespace Modules\BusinessRegistration\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\BusinessRegistrationTemplate;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

trait ProprietorTemplateTrait
{
    private array $template = [
        [
            'title' => 'प्रोपराइटर',
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
            'title' => 'व्यवसाय विवरण',
            'data' => [
                'फर्म/कम्पनी/ब्यवसाय को नाम नेपलीमा' => '[@businessDetail.business_detail_name]',
                'फर्म/कम्पनी/ब्यवसाय को नाम अंग्रेजीमा' => '[@businessDetail.business_detail_name_en]',
                'व्यवसायको प्रकृति' => '[@businessDetail.business_nature]',
                'व्यवसाय स्थापना गरेको साल' => '[@businessDetail.establish_year]',
                'व्यवसाय दर्ता मिति' => '[@businessDetail.registration_date]',
                'पान नम्बर' => '[@businessDetail.pan_no]',
                'लागत रकम रु' => '[@businessDetail.amount_cost]',
                'पूजीको स्रोत' => '[@businessDetail.source_of_capital]',
                'उदेश्य' => '[@businessDetail.purpose]',
                'रोजगार संख्या' => '[@businessDetail.employment]',
                'घर धनिको नाम थर' => '[@businessDetail.house_owner_name]',
                'घर धनिको मोबाइल न' => '[@businessDetail.house_owner_phone]',
                'ठेगाना' => '[@businessDetail.house_owner_address]',
                'मासिक भाडा रु' => '[@businessDetail.house_owner_monthly_rent]',
                'प्रदेश' => '[@businessDetail.province.province]',
                'जिल्ला' => '[@businessDetail.district.district]',
                'पालिका' => '[@businessDetail.localBody.local_body]',
                'वार्ड' => '[@businessDetail.ward_no]',
                'मार्ग' => '[@businessDetail.way]',
                'गाउ/टोल' => '[@businessDetail.tole]',
                'सबमिशन नम्बर' => '[@businessDetail.submission_no]',
                'आर्थिक बर्ष' => '[@businessDetail.fiscalYear.year]',
                'दर्ता नं' => '[@businessDetail.registration_no]',
                'दर्ता मिति नेपलीमा' => '[@businessDetail.registration_date_ne]',
                'दर्ता मिति अंग्रेजी' => '[@businessDetail.registration_date_en]',
            ],
        ],
        [
            'title' => 'परिचय पार्टी',
            'data' => [
                'लम्बाई' => '[@introBoard.length]',
                'चौडाई' => '[@introBoard.width]',
                'वर्गफिट' => '[@introBoard.square]',
            ],
        ],
        [
            'title' => 'पुँजीगत लगानी',
            'data' => [
                'शिर्षक' => '[@businessDetail.investment_revenue.title]',
                'दर्ता शुल्क' => '[@businessDetail.investment_revenue.registration_amount]',
                'नवीकरण शुल्क' => '[@businessDetail.investment_revenue.renew_amount]',
            ],
        ],
        [
            'title' => 'व्यवसायको किसिम',
            'data' => [
                'व्यवसायको वर्ग' => '[@businessDetail.investmentRevenue.objectTransaction.objectTransaction.title]',
                'व्यवसायको उप-वर्ग ' => '[@businessDetail.investmentRevenue.objectTransaction.title]',
            ],
        ],

    ];


    public function getTemplateDataAttribute(): Collection
    {

        return BusinessRegistrationTemplate::get()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);
            return [
                'for' => $applicationTemplate->for,
                'data' => $data
            ];
        });
    }

    public function getSpecificTemplateData($type): string
    {

        $businessTemplate = BusinessRegistrationTemplate::where('for', $type)->first();
        return $this->getData($businessTemplate->data);
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }

    private function getData($data): string
    {
        $replace = [];

        $replace = array_merge( $this->getProprietorReplacement(), $replace, $this->getInvestmentRevenueReplacement(), $this->getIntroBoardReplacement(), $this->getBusinessDetailReplacement(), $this->getBusinessCategoryReplacement());
        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getBusinessDetailReplacement(): array
    {
        return [
            '[@businessDetail.business_detail_name]'=>$this->businessDetail->business_detail_name ?? '',
            '[@businessDetail.business_detail_name_en]'=>$this->businessDetail->business_detail_name_en ?? '',
            '[@businessDetail.business_nature]'=> $this->businessDetail->business_nature?->label() ?? '',
            '[@businessDetail.establish_year]'=>$this->businessDetail->establish_year ?? '',
            '[@businessDetail.registration_date]'=>$this->businessDetail->registration_date ?? '',
            '[@businessDetail.pan_no]'=>$this->businessDetail->pan_no ?? '',
            '[@businessDetail.amount_cost]'=>$this->businessDetail->amount_cost ?? '',
            '[@businessDetail.source_of_capital]'=>  $this->businessDetail->source_of_capital?->label() ?? '',
            '[@businessDetail.purpose]'=>$this->businessDetail->purpose ?? '',
            '[@businessDetail.employment]'=>$this->businessDetail->employment ?? '',
            '[@businessDetail.house_owner_name]'=>$this->businessDetail->house_owner_name ?? '',
            '[@businessDetail.house_owner_phone]'=>$this->businessDetail->house_owner_phone ?? '',
            '[@businessDetail.house_owner_address]'=>$this->businessDetail->house_owner_address ?? '',
            '[@businessDetail.house_owner_monthly_rent]'=>$this->businessDetail->house_owner_monthly_rent ?? '',
            '[@businessDetail.province.province]'=>$this->businessDetail->province->province ?? '',
            '[@businessDetail.district.district]'=>$this->businessDetail->district->district ?? '',
            '[@businessDetail.localBody.local_body]'=>$this->businessDetail->localBody->local_body ?? '',
            '[@businessDetail.ward_no]'=>$this->businessDetail->ward_no ?? '',
            '[@businessDetail.way]'=>$this->businessDetail->way ?? '',
            '[@businessDetail.tole]'=>$this->businessDetail->tole ?? '',
            '[@businessDetail.submission_no]'=>$this->businessDetail->submission_no ?? '',
            '[@businessDetail.fiscalYear.year]'=>$this->businessDetail->fiscalYear->year ?? '',
            '[@businessDetail.registration_no]'=>$this->businessDetail->registration_no ?? '',
            '[@businessDetail.registration_date_ne]'=>$this->businessDetail->registration_date_ne ?? '',
            '[@businessDetail.registration_date_en]'=>$this->businessDetail->registration_date_en ?? '',
        ];

    }

    private function getIntroBoardReplacement(): array
    {
        return [
            '[@introBoard.length]' => $this->introboard->length ?? '',
            '[@introBoard.width]' => $this->introboard->width ?? '',
            '[@introBoard.square]' => $this->introboard->square ?? '',
        ];
    }

    private function getInvestmentRevenueReplacement(): array
    {
        return [
            '[@businessDetail.investment_revenue.title]' => $this->businessDetail->investRevenue->title ?? '',
            '[@businessDetail.investment_revenue.registration_amount]' => $this->businessDetail->investRevenue->registration_amount ?? '',
            '[@businessDetail.investment_revenue.renew_amount]' => $this->businessDetail->investRevenue->renew_amount ?? '',
        ];
    }

    private function getProprietorReplacement(): array
    {
        return [
            '[@name]' => $this->attributes['name'] ?? '',
            '[@citizenship_no]' => $this->attributes['citizenship_no'] ?? '',
            '[@issue_date]' => $this->attributes['name'] ?? '',
            '[@phone]' => $this->attributes['phone'] ?? '',
            '[@email]' => $this->attributes['email'] ?? '',
            '[@ward_no]' => $this->attributes['ward_no'] ?? '',
            '[@way]' => $this->attributes['way'] ?? '',
            '[@tole]' => $this->attributes['tole'] ?? '',
            '[@house_no]' => $this->attributes['house_no'] ?? '',
            '[@account_no]' => $this->attributes['account_no'] ?? '',
            '[@national_card_no]' => $this->attributes['national_card_no'] ?? '',
            '[@gender]' => $this->attributes['gender'] ?? '',
            '[@education_qualification]' => $this->attributes['education_qualification'] ?? '',
            '[@occupation]' => $this->attributes['occupation'] ?? '',
            '[@issueDistrict.district]' => $this->issueDistrict->district ?? '',
            '[@province.province]' => $this->province->province ?? '',
            '[@district.district]' => $this->district->district ?? '',
            '[@localBody.local_body]' => $this->localBody->local_body ?? '',

        ];
    }

    private function getBusinessCategoryReplacement(): array
    {
        return [
           '[@businessDetail.investmentRevenue.objectTransaction.objectTransaction.title]'=>$this->businessDetail->investmentRevenue->objectTransaction->objectTransaction->title ?? '',
           '[@businessDetail.investmentRevenue.objectTransaction.title]'=>$this->businessDetail->investmentRevenue->objectTransaction->title ?? '',
        ];
    }
}
