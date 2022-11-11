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

        foreach ($mapApply->applicantDetail as $applicantDetail) {
            $this->applicantDetail = [
                'applicant_type' => $applicantDetail->applicant_type->value ,
                'relation_with_owner' => $applicantDetail->relation_with_owner->value ?? null,
                'name' => $applicantDetail->name ?? null,
                'phone' => $applicantDetail->phone ?? null,
                'father_name' => $applicantDetail->father_name ?? null,
                'citizenship_issue_district_id' => $applicantDetail->citizenship_issue_district_id ?? null,
                'citizenship_no' => $applicantDetail->citizenship_no ?? null,
                'citizenship_issue_date' => $applicantDetail->citizenship_issue_date ?? null,
                'application_date' => $applicantDetail->application_date ?? null,
                'signature' => $applicantDetail->signature ?? null
            ];
        }
        dd($this->applicantDetail);
    }

    public function render()
    {
        return view('emap::livewire.edit.applicant-detail-edit-livewire');
    }
}
