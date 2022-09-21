<?php

namespace Modules\HelpDesk\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => ['required', Rule::exists('branches', 'id')->withoutTrashed()],
            'service_name' => ['required'],
            'time_taken' => ['required'],
            'responsible_officer' => ['required'],
            'office' => ['required'],
            'photo' => ['nullable', 'image'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'remarks' => ['nullable'],
            'serviceDocuments' => ['required', 'array'],
            'serviceDocuments.*.description' => ['required'],
            'serviceProcesses' => ['required', 'array'],
            'serviceProcesses.*.description' => ['required'],
            'serviceEmployees' => ['required', 'array'],
            'serviceEmployees.*.employee' => ['required']
        ];
    }
}
