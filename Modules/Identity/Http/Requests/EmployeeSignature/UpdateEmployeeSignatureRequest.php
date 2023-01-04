<?php

namespace Modules\Identity\Http\Requests\EmployeeSignature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateEmployeeSignatureRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('employeeSignature_edit');
    }

    public function rules():array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'designation_en' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'pin' => ['required'],
            'black_signature' => ['nullable', 'image'],
            'red_signature' => ['nullable', 'image'],
            'stamp' => ['nullable', 'image'],
            'status'=>['nullable','boolean']
        ];
    }
}
