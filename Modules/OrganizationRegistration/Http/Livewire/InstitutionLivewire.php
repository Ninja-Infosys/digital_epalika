<?php

namespace Modules\OrganizationRegistration\Http\Livewire;

use App\Enums\DesignationTypeEnum;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\OrganizationRegistration\Entities\Institution;

class InstitutionLivewire extends Component
{
    use WithFileUploads;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];

    public array $form = [
        'registration_date',
        'registration_date_en',
        'name',
        'province_id',
        'district_id',
        'local_body_id',
        'ward_no',
        'institution_address',
        'contact_no',
        'email',
        'dao_registration_no',
        'dao_registration_date',
        'dao_registration_date_en',
        'swc_registration_no',
        'swc_registration_date',
        'swc_registration_date_en',
        'pan_vat',
        'objective',
        'area',
        'minute',
        'application',
        'Legislation',
        'Ward_recommendation',
        'stamp',
        'proposed_person',
        'supervisor_person',
        'approval_person',
        'proposed_person_designation',
        'supervisor_person_designation',
        'approval_person_designation',
        'institutionOfficers.*.officer_designation',
        'institutionOfficers.*.officer_name',
        'institutionOfficers.*.officer_citizenship_no',
        'institutionOfficers.*.officer_citizenship_issue_date',
        'institutionOfficers.*.officer_citizenship_issue_date_en',
        'institutionOfficers.*.officer_citizenship_issue_district',
        'institutionOfficers.*.officer_citizenship_issue_current_address',
        'institutionOfficers.*.officer_contact_detail',
        'institutionOfficers.*.officer_photo',
        'institutionOfficers.*.officer_citizenship_front',
        'institutionOfficers.*.officer_citizenship_behind',
    ];

    public function mount()
    {
        $this->form = [
            [
                'officer_designation' => DesignationTypeEnum::CHAIRMAN->value,
            ],
            [
                'officer_designation' => DesignationTypeEnum::SECRETARY->value,
            ],
            [
                'officer_designation' => DesignationTypeEnum::TREASURER->value,
            ]
        ];
        $this->provinces = Province::all();
    }

    public array $rules = [
        'form.registration_date' => ['required'],
        'form.registration_date_en' => ['required', 'date'],
        'form.name' => ['required', 'string', 'max:255'],
        'form.institution_address' => ['required', 'string', 'max:255'],
        'form.contact_no' => ['required'],
        'form.email' => ['required', 'email'],
        'form.dao_registration_no' => ['required', 'numeric'],
        'form.dao_registration_date' => ['required'],
        'form.dao_registration_date_en' => ['required', 'date'],
        'form.swc_registration_no' => ['required', 'numeric'],
        'form.swc_registration_date' => ['required'],
        'form.swc_registration_date_en' => ['required', 'date'],
        'form.pan_vat' => ['required'],
        'form.objective' => ['required'],
        'form.area' => ['required'],
        'form.minute' => ['required','file', 'mimes:jpg,png,pdf,jpeg,doc'],
        'form.application' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
        'form.Legislation' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
        'form.Ward_recommendation' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
        'form.stamp' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
        'form.proposed_person' => ['required', 'string', 'max:255'],
        'form.supervisor_person' => ['required', 'string', 'max:255'],
        'form.approval_person' => ['required', 'string', 'max:255'],
        'form.proposed_person_designation' => ['required', 'string', 'max:255'],
        'form.supervisor_person_designation' => ['required', 'string', 'max:255'],
        'form.approval_person_designation' => ['required', 'string', 'max:255'],
        'form.institutionOfficers.*.officer_designation' => ['required'],
        'form.institutionOfficers.*.officer_name' => ['required'],
        'form.institutionOfficers.*.officer_citizenship_no' => ['required'],
        'form.institutionOfficers.*.officer_citizenship_issue_date' => ['required'],
        'form.institutionOfficers.*.officer_citizenship_issue_date_en' => ['required'],
        'form.institutionOfficers.*.officer_citizenship_issue_district' => ['required'],
        'form.institutionOfficers.*.officer_citizenship_issue_current_address' => ['required'],
        'form.institutionOfficers.*.officer_contact_detail' => ['required'],
        'form.institutionOfficers.*.officer_photo' => ['required', 'mimes:jpg,png,jpeg'],
        'form.institutionOfficers.*.officer_citizenship_front' => ['required', 'mimes:jpg,png,jpeg'],
        'form.institutionOfficers.*.officer_citizenship_behind' => ['required', 'mimes:jpg,png,jpeg'],
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submitFormData()
    {
        $institution = Institution::create($this->validate()['form']);

        $this->reset('form');

        return back();
    }


    public function addOfficer(): void
    {
        $this->form[] = [];

    }

    public function removeOfficer($index): void
    {
        if ($index > 2) {
            unset($this->form[$index]);
            $this->form = array_values($this->form);
        }
    }


    public function render()
    {
        if (!empty($this->form['province_id'])) {
            $this->districts = District::where('province_id', $this->form['province_id'])->get();
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = LocalBody::where('district_id', $this->form['district_id'])->get();
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = LocalBody::findOrFail($this->form['local_body_id'])->ward_no;
        }

        return view('organizationregistration::livewire.institution-livewire');
    }
}
