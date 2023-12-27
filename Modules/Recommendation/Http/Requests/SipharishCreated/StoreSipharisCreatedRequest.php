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
        return [
            'personal_detail_id' => ['required', Rule::exists('personal_details', 'id')->withoutTrashed()],
            'sipharis_category_id' => ['required', Rule::exists('sipharis_categories', 'id')->withoutTrashed()],
            'sipharis_sub_category_id' => ['required', Rule::exists('sipharis_sub_categories', 'id')->withoutTrashed()],
            'sipharis_form_type_id' => ['required', Rule::exists('sipharish_form_types', 'id')->withoutTrashed()],
            'status' => ['required', 'boolean'],
            'fields' => ['nullable', 'array'],
            'fields.*.sipharish_form_field_id' => ['nullable', Rule::exists('sipharis_form_fields', 'id')->withoutTrashed()],
            'fields.*.value' => ['nullable'],
            'fields.*.type' => ['required'],
            'files' => ['nullable', 'array'],
            'files.*.title' => ['required', 'string'],
            'files.*.filename' => ['nullable', 'file'],
            'created_by' => ['nullable']
        ];
    }
}
