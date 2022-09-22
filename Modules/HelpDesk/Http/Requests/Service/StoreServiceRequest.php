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

    public function messages()
    {
        return [
            'branch_id.required' => 'शाखा आवश्यक छ',
            'service_name.required' => 'सेवाको नाम आवश्यक छ',
            'time_taken.required' => 'लाग्ने समय आवश्यक छ',
            'responsible_officer.required' => 'जिम्मेवार अधिकारी आवश्यक छ',
            'office.required' => 'कार्यालय आवश्यक छ',
            'photo.image' => 'फोटोमा हुनुपर्छ',
            'email.required' => 'इमेल अनिबार्य छ ',
            'email.email' => 'इमेल फर्ममा हुनुपर्छ',
            'phone.required' => 'फोन आवश्यक छ',
            'serviceDocuments.required' => 'कागजात आवश्यक छ',
            'serviceDocuments.*.description.required' => 'कागजात आबश्यक छ ',
            'serviceProcesses.required' => 'सेवा उपलब्ध प्रक्रिया आवश्यक छ',
            'serviceProcesses.*.description.required' => 'उपलब्ध प्रक्रिया आबश्यक छ ',
            'serviceEmployees.required' => 'सेवा दिने कर्मचारी आवश्यक छ',
            'serviceEmployees.*.employee.required' => 'कर्मचारीको नाम आबश्यक छ '
        ];
    }
}
