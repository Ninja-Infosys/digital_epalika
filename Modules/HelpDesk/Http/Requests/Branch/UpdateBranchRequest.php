<?php

namespace Modules\HelpDesk\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_name' => ['required', 'string', 'max:255'],
            'branch_id' => ['nullable', Rule::exists('branches', 'id')]
        ];
    }

    public function messages()
    {
        return [
            'branch_name.required' => 'शाखाको  नाम आवश्यक छ',
        ];
    }
}
