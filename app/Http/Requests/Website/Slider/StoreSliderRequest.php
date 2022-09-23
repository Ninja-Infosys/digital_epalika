<?php

namespace App\Http\Requests\Website\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'description' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
          'image.image'=>'फोटो फर्ममा हुनुपर्छ '
        ];
    }
}
