<?php

namespace Modules\Plan\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Enums\ProjectOperatedThroughEnum;
use Modules\Plan\Enums\ProjectStatusEnum;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'registration_no' => ['required', Rule::unique('projects', 'registration_no')->withoutTrashed()],
            'project_name' => ['required'],
            'grant_category_id' => ['required', Rule::exists('grant_categories', 'id')->withoutTrashed()],
            'expense_head_id' => ['required', Rule::exists('expense_heads', 'id')->withoutTrashed()],
            'plan_area_id' => ['required', Rule::exists('plan_areas', 'id')->withoutTrashed()],
            'project_status' => ['required', new Enum(ProjectStatusEnum::class)],
            'project_start_date' => ['nullable'],
            'project_completion_date' => ['nullable', 'after:project_start_date'],
            'plan_level_id' => ['required', Rule::exists('plan_levels', 'id')->withoutTrashed()],
            'ward_no' => ['nullable', 'array'],
            'ward_no.*' => ['integer'],
            'budget_source_id' => ['nullable', Rule::exists('budget_sources', 'id')->withoutTrashed()],
            'budget_head_id' => ['nullable', Rule::exists('budget_heads', 'id')->withoutTrashed()],
            'allocated_amount' => ['nullable', 'numeric'],
            'project_venue' => ['nullable'],
            'purpose' => ['nullable'],
            'operated_through' => ['nullable', new Enum(ProjectOperatedThroughEnum::class)],
            'first_quarterly_amount' => ['nullable', 'numeric'],
            'first_quarterly_goal' => ['nullable', 'numeric'],
            'second_quarterly_amount' => ['nullable', 'numeric'],
            'second_quarterly_goal' => ['nullable', 'numeric'],
            'third_quarterly_amount' => ['nullable', 'numeric'],
            'third_quarterly_goal' => ['nullable', 'numeric'],
        ];
    }
}
