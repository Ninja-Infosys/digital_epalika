<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingNeighbourRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'neighbour_name' => ['required'],
            'direction' => ['required'],
            'ward_no' => ['required'],
            'plot_no' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'neighbour_name.required' => 'संघीयारको नाम अनिवार्य छ|',
            'direction.required' => 'चार किल्लाको अनिवार्य छ|',
            'ward_no.required' => 'संघीयारको वडा नं. अनिवार्य छ|',
            'plot_no.required' => 'संघीयारको कित्ता नं. अनिवार्य छ|',
        ];
    }
}
