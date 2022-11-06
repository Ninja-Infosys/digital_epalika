<?php

namespace Modules\JudicialCommittee\Http\Requests\ChiefJudicialMemeber;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChiefJudicialMemberRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg, png, jpeg'],
            'designation_id' => ['required', Rule::exists('designations', 'id')],
            'phone' => ['nullable'],
            'status' => ['nullable', 'boolean'],
            'position' => ['nullable', 'integer']
        ];
    }

    public function messages()
    {
        return[
            'name.required'=> 'नाम आवश्यक छ',
            'photo.mimes'=>'फोटो jpg, png, jpeg फर्म मा हुनुपर्छ ',
            'designation_id.required'=>'पद आवश्यक छ',
            'position.integer'=>'स्थिति पूर्णांकमा हुनुपर्छ'
        ];
    }
}
