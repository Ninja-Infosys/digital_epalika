<?php

namespace Modules\Recommendation\Http\Requests\RecommendationCreate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecommendationCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'recommendation_detail_id' => ['required', Rule::exists('recommendation_details', 'id')->withoutTrashed()],
            'personal_detail_id' => ['required', Rule::exists('personal_details', 'id')->withoutTrashed()],
            'status' => ['required', 'boolean'],
            'fields' => ['nullable', 'array'],
            'fields.*.recommendation_form_field_id' => ['nullable', Rule::exists('recommendation_form_fields', 'id')->withoutTrashed()],
            'fields.*.value' => ['nullable'],
            'fields.*.type' => ['required'],
            'fields.*.table' => ['required_if:fields.*.type ==,table'],
            'fields.*.table.*.recommendation_form_field_id' => ['nullable', Rule::exists('recommendation_form_fields', 'id')->withoutTrashed()],
            'fields.*.table.*.value' => ['nullable'],
            'fields.*.table.*.type' => ['nullable'],
            'files' => ['nullable', 'array'],
            'files.*.recommendation_document_id' => ['required',Rule::exists('recommendation_documents', 'id')->withoutTrashed()],
            'files.*.file' => ['required', 'file'],
        ];
    }
}
