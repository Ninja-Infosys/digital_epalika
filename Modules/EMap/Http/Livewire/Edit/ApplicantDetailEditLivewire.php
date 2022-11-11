<?php

namespace Modules\EMap\Http\Livewire\Edit;

use Livewire\Component;
use Modules\EMap\Entities\MapApply;

class ApplicantDetailEditLivewire extends Component
{
    public MapApply $mapApply;
    public $allDistricts = [];

    public array $applicantDetail = [
        'applicant_type' => null,
        'relation_with_owner' => null,
        'name' => null,
        'phone' => null,
        'father_name' => null,
        'citizenship_issue_district_id' => null,
        'citizenship_no' => null,
        'citizenship_issue_date' => null,
        'application_date' => null,
        'signature' => null
    ];

    public function mount(MapApply $mapApply, $districts)
    {
        $this->mapApply = $mapApply;
        $this->allDistricts = $districts;

            $this->applicantDetail = [
                'applicant_type' => $mapApply->applicantDetail->applicant_type->value ??null,
                'relation_with_owner' => $mapApply->applicantDetail->relation_with_owner->value ?? null,
                'name' => $mapApply->applicantDetail->name ?? null,
                'phone' => $mapApply->applicantDetail->phone ?? null,
                'father_name' => $mapApply->applicantDetail->father_name ?? null,
                'citizenship_issue_district_id' => $mapApply->applicantDetail->citizenship_issue_district_id ?? null,
                'citizenship_no' => $mapApply->applicantDetail->citizenship_no ?? null,
                'citizenship_issue_date' => $mapApply->applicantDetail->citizenship_issue_date ?? null,
                'application_date' => $mapApply->applicantDetail->application_date ?? null,
                'signature' => $mapApply->applicantDetail->signature ?? null
            ];

    }

    public function render()
    {
        return view('emap::livewire.edit.applicant-detail-edit-livewire');
    }
}
