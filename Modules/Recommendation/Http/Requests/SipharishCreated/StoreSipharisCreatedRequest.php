<?php

namespace Modules\Recommendation\Http\Requests\SipharishCreated;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSipharisCreatedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
                return [];
                break;
            case 'PUT':
                return [
                    
                ];
            default:
                return [
                    'personal_detail_id'=>'required',
                    'sipharis_form_type_id'       => 'required',
                    'status'                          => 'required',
                    'field' => ['required', 'array'],
                    'files' => ['nullable', 'array']
                ];
                break;
        }
    }
}
