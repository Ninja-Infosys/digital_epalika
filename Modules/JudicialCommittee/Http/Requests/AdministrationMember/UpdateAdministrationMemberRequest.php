<?php

namespace Modules\JudicialCommittee\Http\Requests\AdministrationMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdministrationMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg, png, jpeg'],
            'position' => ['nullable', 'integer'],
            'designation_id' => ['required', Rule::exists('designations', 'id')],
            'phone' => ['nullable'],
            'red_signature' => ['nullable', 'image', 'mimes:jpg, png, jpeg'],
            'black_signature' => ['nullable', 'image', 'mimes:jpg, png, jpeg'],
            'status' => ['nullable', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'नाम आवश्यक छ',
            'photo.mimes' => 'फोटो jpg, png, jpeg फार्म हुनुपर्छ',
            'position.integer' => 'स्थिति पूर्णांकमा हुनुपर्छ',
            'designation_id.required' => 'पद आवश्यक छ',
            'red_signature.mimes' => 'फोटो jpg, png, jpeg फार्म हुनुपर्छ',
            'black_signature.mimes' => 'फोटो jpg, png, jpeg फार्म हुनुपर्छ',
        ];
    }
}
