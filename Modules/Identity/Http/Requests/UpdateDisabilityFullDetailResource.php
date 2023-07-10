<?php

namespace Modules\Identity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\BusinessRegistration\Enums\Qualification;

class UpdateDisabilityFullDetailResource extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "disability_reason_id" => ['required', Rule::exists('disability_reasons', 'id')->withoutTrashed()],
            "citizenship_no_place" => ['required', 'string', 'max:255'],
            "citizenship_date_ad" => ['required'],
            "citizenship_date" => ['required'],
            "document_photo" => ['required', 'file', 'mimes:jpeg,jpg,png'],
            "document_photo_back" => ['nullable', 'file', 'mimes:jpeg,jpg,png'],
            "material_description" => ['required'],
            "qualification" => ['required', new Enum(Qualification::class)],
            "daily_activity" => ['required'],
            "supporting_material" => ['required'],
            "helping_task" => ['nullable', 'array'],
            "helping_task.*" => ['string'],
            "without_helping_task" => ['nullable', 'array'],
            "without_helping_task.*" => ['string'],
            "main_training_name" => ['nullable', 'string', 'max:255'],
            "occupation_id" => ['nullable', Rule::exists('occupations', 'id')->withoutTrashed()],
        ];
    }
}
