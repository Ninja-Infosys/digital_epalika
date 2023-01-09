<?php

namespace Modules\Identity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\Identity\Enums\CategoryTypeEnum;

class StoreGovernmentalDisablityRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('governmentalDisabilityType_create');
    }

    public function rules():array
    {
        return [
            'title' => ['required','string','max:255'],
            'title_en' => ['required','string','max:255'],
            'color'=>['required','string','max:255'],
            'position'=>['nullable','integer'],
            'category'=>['required',new Enum(CategoryTypeEnum::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => ['शिर्षक आवश्यक छ'],
            'title_en.required' => ['शिर्षक अंग्रेजीमा आवश्यक छ'],
            'color.required' => ['कोड रङ आवश्यक छ'],
            'position.required' => ['स्थिति आवश्यक छ'],
            'category.required' => ['वर्ग आवश्यक छ'],
        ];
    }
}
