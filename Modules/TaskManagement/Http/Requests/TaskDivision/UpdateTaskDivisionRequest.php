<?php

namespace Modules\TaskManagement\Http\Requests\TaskDivision;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskDivisionRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'task_category_id' => ['required'],
            'title' => ['required']
        ];
    }
    public function messages(): array
    {
        return[
            'task_category_id.required'=>'कार्य आवश्यक छ',
            'title.required'=> 'शीर्षक आवश्यक छ'
        ];
    }
}
