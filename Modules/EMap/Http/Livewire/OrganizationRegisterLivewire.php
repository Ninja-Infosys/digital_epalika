<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class OrganizationRegisterLivewire extends Component
{
    use WithFileUploads;

    public $level = 1;

    public $isOrganization = true;

    public $districts = [];
    public $provinces = [];

//    permanent address
    public $permanentLocalBodies = [];
    public $permanentWards = [];
    public $permanentDistricts = [];

//    temporary address
    public $temporaryLocalBodies = [];
    public $temporaryWards = [];
    public $temporaryDistricts = [];

//    organization address
    public $organizationLocalBodies = [];
    public $organizationWards = [];
    public $organizationDistricts = [];

    public function mount()
    {
        $this->districts = DB::table('districts')->selectRaw('id,district,province_id')->orderBy('province_id')->get();
        $this->provinces = DB::table('provinces')->selectRaw('id,province')->get();
    }

    public $userDetail = [
        'name_ne' => null,
        'name_en' => null,
        'email' => null,
        'phone' => null,
        'gender' => null,
        'marital_status' => null,
        'father_name' => null,
        'grandfather_name' => null,
        'pan_no' => null,
        'nec_no' => null,
        'nec_certificate' => null,
        'citizenship_no' => null,
        'citizenship_issued_district' => null,
        'citizenship_issued_date' => null,
        'citizenship_front' => null,
        'citizenship_back' => null,
        'permanent_province_id' => null,
        'permanent_district_id' => null,
        'permanent_local_body_id' => null,
        'permanent_ward' => null,
        'permanent_tole' => null,
        'temporary_province_id' => null,
        'temporary_district_id' => null,
        'temporary_local_body_id' => null,
        'temporary_ward' => null,
        'temporary_tole' => null,
    ];

    public $organizationDetail = [
        'org_name_ne' => null,
        'org_name_en' => null,
        'org_email' => null,
        'org_contact' => null,
        'company_logo' => null,
        'company_certificate' => null,
        'pan_certificate' => null,
        'org_registration_no' => null,
        'org_registration_document' => null,
        'org_pan_no' => null,
        'org_pan_document' => null,
        'logo' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward' => null,
        'tole' => null,
    ];

    public $taxClearance = [
        'document' => null,
        'year' => null,
    ];

    public function incrementLevel()
    {

        if ($this->level <= 4) {
            $this->level++;
        }

    }

    protected $rules = [
        'userDetail.name_ne' => ['required'],
        'userDetail.name_en' => ['required'],
        'userDetail.email' => ['required', 'email'],
        'userDetail.phone' => ['required'],
        'userDetail.gender' => ['required'],
        'userDetail.marital_status' => ['nullable'],
        'userDetail.father_name' => ['required'],
        'userDetail.grandfather_name' => ['required'],
        'userDetail.pan_no' => ['nullable'],
        'userDetail.nec_no' => ['nullable'],
        'userDetail.nec_certificate' => ['nullable', 'image'],
        'userDetail.citizenship_no' => ['required'],
        'userDetail.citizenship_issued_district' => ['required', 'exists:districts,id,deleted_at,null'],
        'userDetail.citizenship_issued_date' => ['required'],
        'userDetail.citizenship_front' => ['required', 'image'],
        'userDetail.citizenship_back' => ['nullable', 'image'],
        'userDetail.permanent_province_id' => ['required', 'exists:provinces,id,deleted_at,null'],
        'userDetail.permanent_district_id' => ['required', 'exists:districts,id,deleted_at,null'],
        'userDetail.permanent_local_body_id' => ['required', 'exists:local_bodies,id,deleted_at,null'],
        'userDetail.permanent_ward' => ['required'],
        'userDetail.permanent_tole' => ['nullable'],
        'userDetail.temporary_province_id' => ['required', 'exists:provinces,id,deleted_at,null'],
        'userDetail.temporary_district_id' => ['required', 'exists:districts,id,deleted_at,null'],
        'userDetail.temporary_local_body_id' => ['required', 'exists:local_bodies,id,deleted_at,null'],
        'userDetail.temporary_ward' => ['nullable'],
        'userDetail.temporary_tole' => ['nullable'],
        'organizationDetail.org_name_ne' => null,
        'organizationDetail.org_name_en' => null,
        'organizationDetail.org_email' => null,
        'organizationDetail.org_contact' => null,
        'organizationDetail.org_registration_no' => null,
        'organizationDetail.org_registration_document' => null,
        'organizationDetail.org_pan_no' => null,
        'organizationDetail.org_pan_document' => null,
        'organizationDetail.logo' => null,
        'organizationDetail.province_id' => null,
        'organizationDetail.district_id' => null,
        'organizationDetail.local_body_id' => null,
        'organizationDetail.ward' => null,
        'organizationDetail.tole' => null,
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

    }

    public function resetForm()
    {
        $this->reset('userDetail', 'level', 'organizationDetail', 'taxClearance');

    }

    public function decrementLevel()
    {
        if ($this->level >= 1) {
            $this->level--;
        }

    }

    public function checkPermanentAddress()
    {
        if (!empty($this->userDetail['permanent_province_id'])) {
            $this->permanentDistricts = Province::with('districts')->findOrFail($this->userDetail['permanent_province_id'])->districts;
        }
        if (!empty($this->userDetail['permanent_district_id'])) {
            $this->permanentLocalBodies = District::with('localBodies')->findOrFail($this->userDetail['permanent_district_id'])->localBodies;

        }
        if (!empty($this->userDetail['permanent_local_body_id'])) {
            $this->permanentWards = LocalBody::findOrFail($this->userDetail['permanent_local_body_id'])->ward_no;
        }
    }

    public function checkTemporaryAddress()
    {
        if (!empty($this->userDetail['temporary_province_id'])) {
            $this->temporaryDistricts = Province::with('districts')->findOrFail($this->userDetail['temporary_province_id'])->districts;
        }
        if (!empty($this->userDetail['temporary_district_id'])) {
            $this->temporaryLocalBodies = District::with('localBodies')->findOrFail($this->userDetail['temporary_district_id'])->localBodies;
        }
        if (!empty($this->userDetail['temporary_local_body_id'])) {
            $this->temporaryWards = LocalBody::findOrFail($this->userDetail['temporary_local_body_id'])->ward_no;
        }
    }

    public function checkOrganizationAddress()
    {
        if (!empty($this->organizationDetail['province_id'])) {
            $this->organizationDistricts = Province::with('districts')->findOrFail($this->organizationDetail['province_id'])->districts;
        }
        if (!empty($this->organizationDetail['district_id'])) {
            $this->organizationLocalBodies = District::with('localBodies')->findOrFail($this->organizationDetail['district_id'])->localBodies;
        }
        if (!empty($this->organizationDetail['local_body_id'])) {
            $this->organizationWards = LocalBody::findOrFail($this->organizationDetail['local_body_id'])->ward_no;
        }
    }

    public function render()
    {
        $this->checkPermanentAddress();
        $this->checkOrganizationAddress();
        $this->checkTemporaryAddress();
        return view('emap::livewire.organization-register-livewire');
    }
}
