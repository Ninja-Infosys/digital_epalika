<?php

namespace Modules\EMap\Http\Requests\MapFee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMapFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('mapFee_create');
    }

    public function rules(): array
    {
        return [
            'storey' => ['required', 'string', 'max:255'],
            'unit_id' => ['required', Rule::exists('units', 'id')->withoutTrashed()],
            'rate' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'storey.required' => 'तल्ला आवश्यक छ',
            'unit_id.required' => 'एकाइ आवश्यक छ',
            'rate.required' => 'दर आवश्यक छ',
            'rate.numeric' => 'दर संख्यात्मक हुनुपर्छ',
        ];
    }
}
