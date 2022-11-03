<?php

namespace Modules\Roaster\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTrainingRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => ['required',],
            'open_date' => ['required'],
            'closed_date' => ['required'],
            'fiscal_year_id' => ['required', Rule::exists('fiscal_years', 'id')],
            'trainers' => ['nullable', 'array'],
            'trainers.*' => [Rule::exists('trainers', 'id')]
        ];
    }
}
