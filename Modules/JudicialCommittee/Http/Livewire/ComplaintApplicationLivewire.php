<?php

namespace Modules\JudicialCommittee\Http\Livewire;

use App\Models\Address\Province;
use Livewire\Component;
use Modules\JudicialCommittee\Entities\ComplaintApplication;

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

    protected array $rules = [
        'form.complainant_province_id' => ['required', 'exists:provinces,id'],
        'form.complainant_district_id' => ['required', 'exists:districts,id'],
        'form.complainant_local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.complainant_ward_no' => ['required', 'integer'],
        'form.complainant_tole' => ['nullable'],
        'form.complainant_guardian_name' => ['required', 'string', 'max:255'],
        'form.complainant_relationship' => ['required'],
        'form.complainant_age' => ['required', 'integer'],
        'form.complainant_name' => ['required', 'string', 'max:255'],
        'form.defendant_province_id' => ['required', 'exists:provinces,id'],
        'form.defendant_district_id' => ['required', 'exists:districts,id'],
        'form.defendant_local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.defendant_ward_no' => ['required', 'integer'],
        'form.defendant_tole' => ['nullable'],
        'form.defendant_guardian_name' => ['required', 'string', 'max:255'],
        'form.defendant_relationship' => ['required'],
        'form.defendant_age' => ['required', 'integer'],
        'form.defendant_name' => ['required', 'string', 'max:255'],
        'form.subject' => ['required', 'string', 'max:255'],
        'form.complaint_detail' => ['required'],
        'form.date' => ['required'],
        'form.en_date' => ['required'],
        'form.applicant_name' => ['required', 'string', 'max:255'],
        'form.applicant_phone' => ['required'],
        'form.applicant_address' => ['nullable'],
        'form.applicant_signature' => ['required', 'image']
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        dd($this->validate());
        //ComplaintApplication::create($this->validate()['form']);

        $this->reset('form', 'districts', 'localBodies');

        $this->dispatchBrowserEvent('alert_message', [
            'type' => "success",
            'title' => "धन्यबाद",
            'text' => "उजुरी पत्र सफलतापूर्वक थपियो",
        ]);
    }

    public function render()
    {
        return view('judicialcommittee::livewire.complaint-application-livewire');
    }

    public function messages(): array
    {
        return [
            'form.complainant_province_id.required' => 'उजुरीकर्ताको प्रदेश अनिवार्य छ',
            'form.complainant_district_id.required' => 'उजुरीकर्ताको जिल्ला अनिवार्य छ',
            'form.complainant_local_body_id.required' => 'उजुरीकर्ताको स्थानीय निकाय अनिवार्य छ',
            'form.complainant_ward_no.required' => 'उजुरीकर्ताको वार्ड नं अनिवार्य छ',
            'form.complainant_guardian_name.required' => 'उजुरीकर्ताको अभिभावकको नाम अनिवार्य छ',
            'form.complainant_relationship.required' => 'उजुरीकर्ताको सम्बन्ध अनिवार्य छ',
            'form.complainant_age.required' => 'उजुरीकर्ताको उमेर अनिवार्य छ',
            'form.complainant_name.required' => 'उजुरीकर्ताको नाम अनिवार्य छ',
            'form.defendant_province_id.required' => 'प्रतिवादीको प्रदेश अनिवार्य छ',
            'form.defendant_district_id.required' => 'प्रतिवादीको जिल्ला अनिवार्य छ',
            'form.defendant_local_body_id.required' => 'प्रतिवादीको स्थानीय निकाय अनिवार्य छ',
            'form.defendant_ward_no.required' => 'प्रतिवादीको वार्ड नं अनिवार्य छ',
            'form.defendant_guardian_name.required' => 'प्रतिवादीको अभिभावकको नाम अनिवार्य छ',
            'form.defendant_relationship.required' => 'प्रतिवादीको सम्बन्ध अनिवार्य छ',
            'form.defendant_age.required' => 'प्रतिवादीको उमेर अनिवार्य छ',
            'form.defendant_name.required' => 'प्रतिवादीको नाम अनिवार्य छ',
            'form.subject.required' => 'विषय अनिवार्य छ',
            'form.complaint_detail.required' => 'उजुरी विवरण अनिवार्य छ',
            'form.date.required' => 'मिति अनिवार्य छ',
            'form.en_date.required' => 'मिति अनिवार्य छ',
            'form.applicant_name.required' => 'आवेदकको नाम अनिवार्य छ',
            'form.applicant_phone.required' => 'आवेदकको फोन अनिवार्य छ',
            'form.applicant_signature.required' => 'आवेदकको हस्ताक्षर अनिवार्य छ',
        ];
    }
}
