<?php

namespace Modules\JudicialCommittee\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Entities\LawsuitNature;

class ComplaintApplicationLivewire extends Component
{
    use WithFileUploads;

    public $provinces = [];

    public $complainantDistricts = [];

    public $complainantLocalBodies = [];

    public $complainantWards = [];

    public $defendantDistricts = [];

    public $defendantLocalBodies = [];

    public $defendantWards = [];
    public $lawsuitNatures = [];

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
        'lawsuit_nature_id' => null,
        'subject' => null,
        'submission_no' => null,
        'complaint_detail' => null,
        'date' => null,
        'en_date' => null,
        'applicant_name' => null,
        'applicant_phone' => null,
        'applicant_address' => null,
        'applicant_signature' => null,
    ];

    public function mount()
    {
        $this->provinces = Province::all();
        $this->lawsuitNatures = LawsuitNature::all();
    }

    protected $listeners = ['dateChanged'];

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->form['date'] = $nepaliDate;
        $this->form['en_date'] = $englishDate;
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
        'form.lawsuit_nature_id' => ['required', 'exists:lawsuit_natures,id'],
        'form.subject' => ['required', 'string', 'max:255'],
        'form.submission_no' => ['required', 'unique:complaint_applications,submission_no'],
        'form.complaint_detail' => ['required'],
        'form.date' => ['required'],
        'form.en_date' => ['required'],
        'form.applicant_name' => ['required', 'string', 'max:255'],
        'form.applicant_phone' => ['required'],
        'form.applicant_address' => ['nullable'],
        'form.applicant_signature' => ['required', 'image'],
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        ComplaintApplication::create($this->validate()['form'] + [
            'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
        ]);

        $this->reset('form', 'complainantDistricts', 'complainantLocalBodies', 'complainantWards', 'defendantDistricts', 'defendantLocalBodies', 'defendantWards');

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'उजुरी पत्र सफलतापूर्वक थपियो'
        ]);
    }

    public function render()
    {
        if (!empty($this->form['complainant_province_id'])) {
            $this->complainantDistricts = District::where('province_id', $this->form['complainant_province_id'])->get();
        }
        if (!empty($this->form['complainant_district_id'])) {
            $this->complainantLocalBodies = LocalBody::where('district_id', $this->form['complainant_district_id'])->get();
        }
        if (!empty($this->form['complainant_local_body_id'])) {
            $this->complainantWards = LocalBody::findOrFail($this->form['complainant_local_body_id'])->ward_no;
        }

        if (!empty($this->form['defendant_province_id'])) {
            $this->defendantDistricts = District::where('province_id', $this->form['defendant_province_id'])->get();
        }
        if (!empty($this->form['defendant_district_id'])) {
            $this->defendantLocalBodies = LocalBody::where('district_id', $this->form['defendant_district_id'])->get();
        }
        if (!empty($this->form['defendant_local_body_id'])) {
            $this->defendantWards = LocalBody::findOrFail($this->form['defendant_local_body_id'])->ward_no;
        }

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
            'form.lawsuit_nature_id' => 'मुद्दा प्रकृति अनिवार्य छ',
            'form.subject.required' => 'विषय अनिवार्य छ',
            'form.submission_no.required' => 'सबमिशन नम्बर अनिवार्य छ',
            'form.submission_no.unique' => 'सबमिशन नम्बर पहिले नै अवस्थित छ',
            'form.complaint_detail.required' => 'उजुरी विवरण अनिवार्य छ',
            'form.date.required' => 'मिति अनिवार्य छ',
            'form.en_date.required' => 'मिति अनिवार्य छ',
            'form.applicant_name.required' => 'आवेदकको नाम अनिवार्य छ',
            'form.applicant_phone.required' => 'आवेदकको फोन अनिवार्य छ',
            'form.applicant_signature.required' => 'आवेदकको हस्ताक्षर अनिवार्य छ',
        ];
    }
}
