<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Identity\Entities\EmployeeSignature;
use Modules\Identity\Entities\SeniorCitizenDetail;

class SeniorCitizenDetailLivewire extends Component
{
    use WithFileUploads;

    public $provinces = [];
    public $districts = [];
    public $localBodies = [];
    public $wards = '';
    public $employeeSignatures = [];

    public SeniorCitizenDetail $seniorCitizenDetail;
    public array $form = [
        'photo' => null,
        'left_finger' => null,
        'right_finger' => null,
        'name' => null,
        'name_en' => null,
        'dob_bs' => null,
        'card_no' => null,
        'gender' => null,
        'citizenship_no' => null,
        'issue_date_bs' => null,
        'spouse' => null,
        'spouse_en' => null,
        'blood_group' => null,
        'father_name' => null,
        'father_name_en' => null,
        'mother_name_en' => null,
        'mother_name' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'patrons_name' => null,
        'patrons_name_en' => null,
        'patrons_name_address' => null,
        'contact_person_name' => null,
        'contact_person_name_en' => null,
        'contact_person_phone' => null,
        'contact_person_address' => null,
        'is_disease' => 0,
        'disease_name' => null,
        'description' => null,
        'description_en' => null,
        'is_medicine' => 0,
        'medicine_name' => null,
        'employee_signature_id' => null,
    ];

    public function mount($seniorCitizenDetail = null): void
    {
        $officeSetting = OfficeSetting::first();
        $this->employeeSignatures = EmployeeSignature::all();
        $this->provinces = Province::all();

        if (!empty($seniorCitizenDetail)) {
            $this->seniorCitizenDetail = $seniorCitizenDetail;
            foreach ($this->form as $key => $data) {
                if (!in_array($key, ['photo', 'left_finger', 'right_finger'])) {
                    $this->form[$key] = $seniorCitizenDetail[$key];
                }
            }
        }
    }

    protected
    array $rules = [

        'form.photo' => ['required'],
        'form.left_finger' => ['required'],
        'form.right_finger' => ['required'],
        'form.name' => ['required'],
        'form.name_en' => ['required'],
        'form.dob_bs' => ['required'],
        'form.card_no' => ['required'],
        'form.gender' => ['required'],
        'form.citizenship_no' => ['required'],
        'form.issue_date_bs' => ['required'],
        'form.spouse' => ['required'],
        'form.spouse_en' => ['required'],
        'form.blood_group' => ['required'],
        'form.father_name' => ['required'],
        'form.father_name_en' => ['required'],
        'form.mother_name_en' => ['required'],
        'form.mother_name' => ['required'],
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.ward_no' => ['required'],
        'form.tole' => ['required'],
        'form.patrons_name' => ['required'],
        'form.patrons_name_en' => ['required'],
        'form.patrons_name_address' => ['required'],
        'form.contact_person_name' => ['required'],
        'form.contact_person_name_en' => ['required'],
        'form.contact_person_phone' => ['required'],
        'form.contact_person_address' => ['required'],
        'form.is_disease' => ['required'],
        'form.disease_name' => ['required'],
        'form.description' => ['required'],
        'form.description_en' => ['required'],
        'form.is_medicine' => ['required'],
        'form.medicine_name' => ['required'],
        'form.employee_signature_id' => ['required'],

    ];


    public
    function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public
    function saveForm()
    {
        $this->validate()['form'];
        SeniorCitizenDetail::create($this->validate()['form']);
        dd('dd');
    }

    public
    function render(): Factory|View|Application
    {
        if (!empty($this->form['province_id'])) {
            $this->districts = Province::with('districts')->findOrFail($this->form['province_id'])->districts;
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = District::with('localBodies')->findOrFail($this->form['district_id'])->localBodies;
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = LocalBody::findOrFail($this->form['local_body_id'])->wards;
        }
        if ($this->form['is_disease'] == '0') {
            $this->form['disease_name'] = null;
        }
        if ($this->form['is_medicine'] == '0') {
            $this->form['medicine_name'] = null;
        }
        return view('identity::livewire.senior-citizen-detail-livewire');
    }
}
