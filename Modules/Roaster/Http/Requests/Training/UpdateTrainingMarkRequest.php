<?php

namespace Modules\Roaster\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingMarkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'aim' => ['nullable'],
            'description' => ['nullable'],
            'places' => ['nullable'],
            'pre_max_mark' => ['nullable', 'integer'],
            'pre_min_mark' => ['nullable', 'integer'],
            'pre_average_mark' => ['nullable', 'integer'],
            'post_max_mark' => ['nullable', 'integer'],
            'post_min_mark' => ['nullable', 'integer'],
            'post_average_mark' => ['nullable', 'integer'],
            'included_subjects' => ['nullable'],
        ];
    }
}
