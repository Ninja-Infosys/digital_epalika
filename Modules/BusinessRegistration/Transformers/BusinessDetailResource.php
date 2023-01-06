<?php

namespace Modules\BusinessRegistration\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessDetailResource extends JsonResource
{

    public function toArray($request): array
    {
//        dd($this);
        $address = '';
        if (!empty($this->local_body_id)) {
            $address .= $this->localBody->local_body;
        }
        if (!empty($this->ward_no)) {
            $address .= "-" . $this->ward_no;
        }
        if (!empty($this->tole)) {
            $address .= ", " . $this->tole;
        }
        if (!empty($this->district_id)) {
            $address .= ", " . $this->district->district;
        }
        if (!empty($this->province_id)) {
            $address .= ", " . $this->province->province;
        }
        return [
            'व्यवसायको प्रकार' => $this->business_type ?? '',
            'व्यवसायको प्रकृति' => $this->business_nature ?? '',
//            'प्रोपाईटरको विवरण' => $this->whenLoaded('proprietorDetail') ?? '',
            'व्यवसायको नाम' => $this->business_detail_name ?? '',
            'व्यवसायको नाम (अंग्रेजीमा)' => $this->business_detail_name_en ?? '',
            'ठेगाना' => $address ?? '',
//            'लगानी राजस्व' => $this->whenLoaded('investmentRevenue') ?? '',
            'स्थापना वर्ष' => $this->establish_year ?? '',
            'दर्ता मिति' => $this->registration_date ?? '',
            'प्यान नम्बर' => $this->pan_no ?? '',
            'लागत' => $this->amount_cost ?? '',
            'पुँजीको स्रोत' => $this->source_of_capital ?? '',
            'उद्देश्य' => $this->purpose ?? '',
            'रोजगारी' => $this->employment ?? '',
            'घर मालिकको नाम' => $this->house_owner_name ?? '',
            'घर मालिकको फोन' => $this->house_owner_phone ?? '',
            'घर मालिकको ठेगाना' => $this->house_owner_address ?? '',
            'मासिक भाडा' => $this->house_owner_monthly_rent ?? '',
            'बाटो' => $this->way ?? '',
            'सबमिशन नम्बर' => $this->submission_no ?? '',
            'दर्ता भएको छ' => $this->is_registered ?? '',
            'भाडामा छ' => $this->is_rent ?? '',
            'आर्थिक वर्ष' => $this->fiscalYear->title ?? '',
            'दर्ता नं' => $this->registration_no ?? '',
            'दर्ता मिति BS' => $this->registration_date_ne ?? '',
            'दर्ता मिति AD' => $this->registration_date_en ?? '',
            'फोटो' => $this->photo_url ?? '',
            'नागरिकता अगाडि' => $this->citizenship_front_url ?? '',
            'नागरिकता फिर्ता' => $this->citizenship_back_url ?? '',
            'कम्पनी दर्ता' => $this->company_registration_url ?? '',
            'कर भुक्तानी फाइल' => $this->tax_pay_file_url ?? '',
            'सम्पत्ति' => $this->property ?? '',
            'हस्ताक्षर' => $this->signature ?? '',
            'औंठा छाप' => $this->thumb ?? '',
            'बोर्डको लम्बाइ' => $this->length ?? '',
            'बोर्डको चौडाइ' => $this->width ?? '',
            'बोर्डको वर्ग' => $this->square ?? '',
            'दर्खास्त शुल्क' => $this->application_fee ?? '',
            'दर्ता शुल्क' => $this->registration_fee ?? '',
            'व्यापार कर' => $this->business_tax ?? '',
            'परिचय बोर्ड शुल्क' => $this->introduction_board_fees ?? '',
            'जरिवाना' => $this->fine ?? '',
//            'वस्तु लेनदेन' => $this->whenLoaded('objectTransaction') ?? ''
        ];
    }
}








































