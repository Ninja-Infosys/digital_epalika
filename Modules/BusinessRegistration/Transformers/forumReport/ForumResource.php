<?php

namespace Modules\BusinessRegistration\Transformers\forumReport;

use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request): array
    {
        $request_columns = $request->input('columns')['forums'] ?? [];
        return [
            'सबमिशन नम्बर' => $this->when(in_array('submission_no', $request_columns), $this->submission_no ?? ''),
            'फर्मको ठेगाना ' => $this->when((bool)array_intersect(['province_id', 'district_id', 'local_body_id', 'ward_no', 'tole','way'], $request_columns), function () use ($request_columns) {
                return $this->resolveAddress($request_columns);
            }),
            'आर्थिक बर्ष' => $this->when(in_array('fiscal_year_id', $request_columns), $this->fiscalYear->title ?? ''),
            'बिल नं.' => $this->when(in_array('bill_no', $request_columns), $this->bill_no ?? ''),
            'बिल मिति बि स.' => $this->when(in_array('bill_date_bs', $request_columns), $this->bill_date_bs ?? ''),
            'बिल मिति ई स.' => $this->when(in_array('bill_date_ad', $request_columns), $this->bill_date_ad ?? ''),
            'रकम' => $this->when(in_array('amount', $request_columns), $this->amount ?? ''),
            'करदाता नम्बर' => $this->when(in_array('taxpayer_number', $request_columns), $this->taxpayer_number ?? ''),
            'दर्ता नम्बर' => $this->when(in_array('registration_no', $request_columns), $this->registration_no ?? ''),
            'दर्ता मिति बि. सं.' => $this->when(in_array('registration_date_ne', $request_columns), $this->registration_date_ne ?? ''),
            'दर्ता मिति ई. सं.' => $this->when(in_array('registration_date_en', $request_columns), $this->registration_date_en ?? ''),
            'फर्मको नाम' => $this->when(in_array('name', $request_columns), $this->name ?? ''),
            'फर्मको नाम(अंग्रेजीमा)' => $this->when(in_array('name_en', $request_columns), $this->name_en ?? ''),
            'फर्मको प्रकार' => $this->when(in_array('type', $request_columns), $this->type ?? ''),
            'ठेगाना' => $this->when(in_array('address', $request_columns), $this->address ?? ''),
            'ठेगाना(अंग्रेजीमा)' => $this->when(in_array('address_en', $request_columns), $this->address_en ?? ''),
            'सम्पर्क नं.' => $this->when(in_array('phone', $request_columns), $this->phone ?? ''),
            'ईमेल' => $this->when(in_array('email', $request_columns), $this->email ?? ''),
            'उद्देश्य' => $this->when(in_array('purpose', $request_columns), $this->purpose ?? ''),
            'फर्म संचालन मिति' => $this->when(in_array('establish_date', $request_columns), $this->establish_date ?? ''),
            'पुर्ब' => $this->when(in_array('east', $request_columns), $this->east ?? ''),
            'पश्चिम' => $this->when(in_array('west', $request_columns), $this->west ?? ''),
            'उत्तर' => $this->when(in_array('north', $request_columns), $this->north ?? ''),
            'दक्षिण' => $this->when(in_array('south', $request_columns), $this->south ?? ''),
            'कित्ता नं' => $this->when(in_array('plot_no', $request_columns), $this->plot_no ?? ''),
            'क्षेत्रफल' => $this->when(in_array('area', $request_columns), $this->area ?? ''),
            'आवेदन मिति बि. सं.' => $this->when(in_array('application_date', $request_columns), $this->application_date ?? ''),
            'आवेदन मिति ई. सं.' => $this->when(in_array('application_date_en', $request_columns), $this->application_date_en ?? ''),

            'फर्म नवीकरण' => ForumRenewResource::collection($this->whenLoaded('forumRenew')),
        ];
    }

    private function resolveAddress($request_columns): string
    {
        $address = '';
        if (in_array('local_body_id', $request_columns)) {
            $address .= $this->localBody->local_body ?? '';
        }
        if (in_array('ward_no', $request_columns)) {
            $address .= '-' . ($this->ward_no ?? '');
        }
        if (in_array('tole', $request_columns)) {
            $address .= ', ' . ($this->tole ?? '');
        }
        if (in_array('district_id', $request_columns)) {
            $address .= ', ' . ($this->district->district ?? '');
        }
        if (in_array('province_id', $request_columns)) {
            $address .= ', ' . ($this->province->province ?? '');
        }
        return $address;
    }
}
