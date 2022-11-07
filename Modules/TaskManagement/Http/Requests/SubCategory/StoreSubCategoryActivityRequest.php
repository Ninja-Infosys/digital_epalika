<?php

namespace Modules\TaskManagement\Http\Requests\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryActivityRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'main_category_id' => ['required'],
            'title' => ['required']
        ];
    }
    public function messages()
    {
        return[
            'branch_id.required'=>'कार्य आवश्यक छ',
            'title.required'=> 'शीर्षक आवश्यक छ'
        ];
    }
}
