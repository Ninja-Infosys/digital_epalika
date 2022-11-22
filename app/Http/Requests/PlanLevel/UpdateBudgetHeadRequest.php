<?php

namespace App\Http\Requests\PlanLevel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBudgetHeadRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'budget_head_id' => ['nullable', Rule::exists('budget_heads', 'id')->withoutTrashed()],
            'title' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'शीर्षक आवश्यक छ'
        ];
    }
}
