<?php

namespace Modules\BusinessRegistration\Transformers\IndustryReport;

use Illuminate\Http\Resources\Json\JsonResource;

class IndustryRenewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $request_columns = $request->input('columns')['industry_renews'] ?? [];

        return [
            'आर्थिक बर्ष' => $this->when(in_array('fiscal_year_id', $request_columns), $this->fiscalYear->title ?? ''),
            'नबिकरण मिति वि.सं.' => $this->when(in_array('date', $request_columns), $this->date ?? ''),
            'नबिकरण मिति ई.सं.' => $this->when(in_array('date_en', $request_columns), $this->date_en ?? ''),
            'नबिकरण कायम रहने मिति वि.सं.' => $this->when(in_array('date_to_be_maintained', $request_columns), $this->date_to_be_maintained ?? ''),
            'नबिकरण कायम रहने मिति ई.सं.' => $this->when(in_array('date_to_be_maintained_en', $request_columns), $this->date_to_be_maintained_en ?? ''),
            'नबिकरण रकम' => $this->when(in_array('renew_amount', $request_columns), $this->renew_amount ?? ''),
            'जरिवाना रकम' => $this->when(in_array('penalty_amount', $request_columns), $this->penalty_amount ?? ''),
            'बिल नं.' => $this->when(in_array('payment_receipt', $request_columns), $this->payment_receipt ?? ''),
            'रसिद मिति वि.सं.' => $this->when(in_array('payment_receipt_date', $request_columns), $this->payment_receipt_date ?? ''),
            'रसिद मिति ई.सं.' => $this->when(in_array('payment_receipt_date_en', $request_columns), $this->payment_receipt_date_en ?? ''),
            'दर्ता नम्बर' => $this->when(in_array('registration_no', $request_columns), $this->registration_no ?? ''),
            'दर्ता मिति' => $this->when(in_array('registration_date', $request_columns), $this->registration_date ?? ''),

        ];
    }
}
