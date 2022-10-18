<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\Organization;

class OrganizationRegisterLivewire extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;

    public $is_same_as_permanent = null;

    public $is_organization = "1";

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
        $this->districts = District::orderBy('province_id')->get();
        $this->provinces = Province::all();
    }

    public $user = [
        'name' => null,
        'email' => null,
        'phone' => null
    ];

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

    public function nextStep($step)
    {
        $this->validate();
        $this->currentStep = $step;
    }

    public function backStep($step)
    {
        $this->currentStep = $step;
    }

    protected $baseRule = [
        'user.name' => ['required'],
        'user.email' => ['required', 'email', 'unique:organizations,email'],
        'user.phone' => ['required', 'unique:organizations,phone'],
    ];

    protected array $firstStepValidations = [
        'is_organization' => ['required'],
        'userDetail.name_ne' => ['required'],
        'userDetail.name_en' => ['required'],
        'userDetail.email' => ['required', 'email'],
        'userDetail.phone' => ['required'],
        'userDetail.gender' => ['required'],
        'userDetail.marital_status' => ['nullable'],
        'userDetail.father_name' => ['required'],
        'userDetail.grandfather_name' => ['required'],
    ];

    protected array $secondStepValidations = [
        'userDetail.pan_no' => ['nullable'],
        'userDetail.nec_no' => ['nullable'],
        'userDetail.nec_certificate' => ['nullable', 'image'],
        'userDetail.citizenship_no' => ['required'],
        'userDetail.citizenship_issued_district' => ['required', 'exists:districts,id,deleted_at,NULL'],
        'userDetail.citizenship_issued_date' => ['required'],
        'userDetail.citizenship_front' => ['required', 'image'],
        'userDetail.citizenship_back' => ['nullable', 'image'],
    ];

    protected array $thirdStepValidations = [
        'userDetail.permanent_province_id' => ['required', 'exists:provinces,id,deleted_at,NULL'],
        'userDetail.permanent_district_id' => ['required', 'exists:districts,id,deleted_at,NULL'],
        'userDetail.permanent_local_body_id' => ['required', 'exists:local_bodies,id,deleted_at,NULL'],
        'userDetail.permanent_ward' => ['required'],
        'userDetail.permanent_tole' => ['nullable'],
        'userDetail.temporary_province_id' => ['required', 'exists:provinces,id,deleted_at,NULL'],
        'userDetail.temporary_district_id' => ['required', 'exists:districts,id,deleted_at,NULL'],
        'userDetail.temporary_local_body_id' => ['required', 'exists:local_bodies,id,deleted_at,NULL'],
        'userDetail.temporary_ward' => ['nullable'],
        'userDetail.temporary_tole' => ['nullable'],
    ];

    protected array $fourthStepValidations = [
        'organizationDetail.org_name_ne' => ['required'],
        'organizationDetail.org_name_en' => ['required'],
        'organizationDetail.org_email' => ['required'],
        'organizationDetail.org_contact' => ['required'],
        'organizationDetail.org_registration_no' => ['required'],
        'organizationDetail.org_pan_no' => ['required'],
        'organizationDetail.province_id' => ['required', 'exists:provinces,id,deleted_at,NULL'],
        'organizationDetail.district_id' => ['required', 'exists:districts,id,deleted_at,NULL'],
        'organizationDetail.local_body_id' => ['required', 'exists:local_bodies,id,deleted_at,NULL'],
        'organizationDetail.ward' => ['required'],
        'organizationDetail.tole' => ['nullable'],
    ];

    protected array $fifthStepValidations = [
        'organizationDetail.org_registration_document' => ['required', 'image'],
        'organizationDetail.org_pan_document' => ['required', 'image'],
        'organizationDetail.logo' => ['nullable', 'image'],
        'taxClearance.document' => ['required'],
        'taxClearance.year' => ['nullable'],
    ];

    protected function rules(): array
    {
        return match ($this->currentStep) {
            1 => $this->firstStepValidations,
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            5 => $this->fifthStepValidations,
            default => array_merge($this->firstStepValidations),
        };

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();
        DB::transaction(function () {
            $DbUser = Organization::create($this->user);
            $DbUser->userDetail()->create($this->userDetail);
            if ($this->is_organization) {
                $DbOrgDetail = $DbUser->organizationDetail()->create($this->organizationDetail);
                $DbOrgDetail->taxClearances()->create($this->taxClearance);
            }

            $this->resetForm();
        });
        $this->dispatchBrowserEvent('alert_message', [
            'type' => "success",
            'title' => "धन्यबाद",
            'text' => "तपाईको फारम सफलतापूर्वक दर्ता भयो",
        ]);
    }

    public function resetForm()
    {
        $this->reset('userDetail', 'level', 'organizationDetail', 'taxClearance', 'is_organization', 'maxLevel', 'level', 'progress');

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

    public function checkSameAsPermanentAddress()
    {
        if ($this->is_same_as_permanent === "1") {
            $this->temporaryDistricts = $this->permanentDistricts;
            $this->temporaryLocalBodies = $this->permanentLocalBodies;
            $this->temporaryWards = $this->permanentWards;
            $this->userDetail['temporary_province_id'] = $this->userDetail['permanent_province_id'];
            $this->userDetail['temporary_district_id'] = $this->userDetail['permanent_district_id'];
            $this->userDetail['temporary_local_body_id'] = $this->userDetail['permanent_local_body_id'];
            $this->userDetail['temporary_ward'] = $this->userDetail['permanent_ward'];
            $this->userDetail['temporary_tole'] = $this->userDetail['permanent_tole'];
        } else {
            $this->userDetail['temporary_province_id'] = null;
            $this->userDetail['temporary_district_id'] = null;
            $this->userDetail['temporary_local_body_id'] = null;
            $this->userDetail['temporary_ward'] = null;
            $this->userDetail['temporary_tole'] = null;
        }
    }

    public function render()
    {
        $this->checkPermanentAddress();
        $this->checkOrganizationAddress();
        $this->checkTemporaryAddress();
        $this->checkSameAsPermanentAddress();

        return view('emap::livewire.organization-register-livewire');
    }
}
