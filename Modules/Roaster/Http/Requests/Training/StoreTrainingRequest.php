<?php

namespace Modules\Roaster\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingRequest extends FormRequest
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
            'form_type' => ['required'],
            'trainers' => ['nullable', 'array'],
            'trainers.*' => [Rule::exists('trainers', 'id')]
        ];
    }
}
