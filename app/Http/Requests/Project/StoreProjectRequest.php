<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'registration_no' => ['required',Rule::unique('projects','registration_no')->withoutTrashed()],
            'project_name' => ['required'],
            'plan_area_id' => ['required', Rule::exists('plan_areas', 'id')->withoutTrashed()],
            'project_status' => ['required'],
            'project_start_date' => ['nullable'],
            'project_completion_date' => ['nullable','after:project_start_date'],
            'plan_level_id' => ['required', Rule::exists('plan_levels', 'id')->withoutTrashed()],
            'ward_no' => ['nullable', 'integer'],
            'budget_source_id' => ['nullable', Rule::exists('budget_sources', 'id')->withoutTrashed()],
            'budget_head_id' => ['nullable', Rule::exists('budget_heads', 'id')->withoutTrashed()],
            'allocated_amount' => ['nullable', 'numeric'],
            'project_venue' => ['nullable'],
            'purpose' => ['nullable'],
            'operated_through' => ['nullable'],
        ];
    }
}
