<?php

namespace Modules\EMap\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganizationArchiveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'organization_id' => ['required',Rule::exists('organizations', 'id')->withoutTrashed()],
            'archive_date_bs' => ['required'],'files' => ['required', 'array'],
            'files.*.file_name' => ['required'],
            'files.*.file' => ['required'],
        ];
    }
}
