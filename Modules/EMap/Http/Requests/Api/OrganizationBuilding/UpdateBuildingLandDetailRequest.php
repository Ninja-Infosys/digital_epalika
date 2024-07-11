<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingLandDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'land_area' => ['required', 'string'],
            'field_land_area' => ['required', 'string'],
            'plot_no'=> ['required', 'string'],
            'land_detail' => ['nullable'],
            'land_ward_no' => ['required'],
            'land_tole' => ['required'],
            'former_local_body' => ['required'],
            'former_ward_no' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'land_area.required' => 'जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल अनिवार्य छ|',
            'field_land_area.required' => ' फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक क्षेत्रफल अनिवार्य छ|',
            'plot_no.required' => 'निर्माण भएको जग्गाको कित्ता नं. अनिवार्य छ|',
            'land_ward_no.required' => ' वार्ड नं. अनिवार्य छ|',
            'land_tole.required' => 'निर्माण भएको जग्गाको कित्ता नं. अनिवार्य छ|',
            'former_local_body.required' => '  साविक पालिका अनिवार्य छ|',
            'former_ward_no.required' => 'साविक वाड नं. अनिवार्य छ|',
        ];
    }
}
