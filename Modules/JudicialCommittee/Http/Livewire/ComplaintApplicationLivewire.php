<?php

namespace Modules\JudicialCommittee\Http\Livewire;

use App\Models\Address\Province;
use Livewire\Component;

class ComplaintApplicationLivewire extends Component
{
    public $provinces = [];

    public array $form = [
        'complainant_province_id' => null,
        'complainant_district_id' => null,
        'complainant_local_body_id' => null,
        'complainant_ward_no' => null,
        'complainant_tole' => null,
        'complainant_guardian_name' => null,
        'complainant_relationship' => null,
        'complainant_age' => null,
        'complainant_name' => null,
        'defendant_province_id' => null,
        'defendant_district_id' => null,
        'defendant_local_body_id' => null,
        'defendant_ward_no' => null,
        'defendant_tole' => null,
        'defendant_guardian_name' => null,
        'defendant_relationship' => null,
        'defendant_age' => null,
        'defendant_name' => null,
        'subject' => null,
        'complaint_detail' => null,
        'date' => null,
        'en_date' => null,
        'applicant_name' => null,
        'applicant_phone' => null,
        'applicant_address' => null,
        'applicant_signature' => null
    ];

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function render()
    {
        return view('judicialcommittee::livewire.complaint-application-livewire');
    }
}
