<?php

namespace Modules\Grant\Http\Requests\Infrastructure;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreInfrastructureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('infrastructure_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('infrastructures', 'title')->withoutTrashed()]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'पूर्वाधार शीर्षक आवश्यक छ',
            'title.unique' => 'पूर्वाधार शीर्षक अद्वितीय हुनुपर्छ'
        ];
    }
}
