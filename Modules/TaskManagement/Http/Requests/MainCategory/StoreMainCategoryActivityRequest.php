<?php

namespace Modules\TaskManagement\Http\Requests\MainCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainCategoryActivityRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'branch_id' => ['required'],
            'title' => ['required']
        ];
    }
    public function messages()
    {
        return[
            'branch_id.required'=>'शाखा आवश्यक छ',
            'title.required'=> 'शीर्षक आवश्यक छ'
        ];
    }
}
