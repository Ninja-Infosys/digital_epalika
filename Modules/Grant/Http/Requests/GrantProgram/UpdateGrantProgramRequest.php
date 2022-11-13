<?php

namespace Modules\Grant\Http\Requests\GrantProgram;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateGrantProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('grantProgram_edit');
    }

    public function rules(): array
    {
        return [
            'fiscal_year_id' => ['required', Rule::exists('fiscal_years', 'id')->withoutTrashed()],
            'program_name' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'fiscal_year_id.required' => 'आर्थिक वर्ष आवश्यक छ',
            'program_name.required' => 'कार्यक्रम शीर्षक आवश्यक छ',
        ];
    }
}
