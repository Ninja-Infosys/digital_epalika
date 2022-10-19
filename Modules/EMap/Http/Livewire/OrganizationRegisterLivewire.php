<?php

namespace Modules\EMap\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\Organization;

class OrganizationRegisterLivewire extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;
    public float $progressPercentage = 0;

    public $is_same_as_permanent = false;

    public $is_organization = "1";

    public $districts = [];
    public $provinces = [];

    public array $address = [
        'permanentProvince' => null,
        'permanentDistrict' => null,
        'permanentLocalBody' => null,
        'temporaryProvince' => null,
        'temporaryDistrict' => null,
        'temporaryLocalBody' => null,
        'organizationProvince' => null,
        'organizationDistrict' => null,
        'organizationLocalBody' => null,
        'citizenshipIssuedDistrict' => null,
        'permanentLocalBodies' => [],
        'permanentWards' => [],
        'permanentDistricts' => [],
        'temporaryLocalBodies' => [],
        'temporaryWards' => [],
        'temporaryDistricts' => [],
        'organizationLocalBodies' => [],
        'organizationWards' => [],
        'organizationDistricts' => [],
    ];

    public array $user = [
        'name' => null,
        'email' => null,
        'phone' => null
    ];

    public array $userDetail = [
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

    public array $organizationDetail = [
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

    public array $taxClearance = [
        'document' => null,
        'year' => null,
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
        'taxClearance.year' => ['required'],
    ];

    protected array $sixthStepValidations = [
        'user.name' => ['required', 'unique:organizations,name'],
        'user.email' => ['required', 'email', 'unique:organizations,email'],
        'user.phone' => ['required', 'unique:organizations,phone'],
    ];

    public function mount(): void
    {
        $this->districts = District::orderBy('province_id')->get();
        $this->provinces = Province::get();
    }

    public function nextStep($step): void
    {
        $this->validate();
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function backStep($step): void
    {
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    protected function rules(): array
    {
        return match ($this->currentStep) {
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            5 => $this->fifthStepValidations,
            6 => $this->sixthStepValidations,
            default => $this->firstStepValidations,
        };

    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData(): void
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

    public function resetForm(): void
    {
        $this->reset('is_organization', 'is_same_as_permanent', 'currentStep', 'address', 'userDetail', 'user', 'organizationDetail', 'taxClearance');

    }

    public function checkPermanentAddress(): void
    {
        if (!empty($this->userDetail['permanent_province_id'])) {
            $this->address['permanentDistricts'] = Province::with('districts')->findOrFail($this->userDetail['permanent_province_id'])->districts;
            $this->address['permanentProvince'] = $this->provinces->firstWhere('id', $this->userDetail['permanent_province_id']);
        }
        if (!empty($this->userDetail['permanent_district_id'])) {
            $this->address['permanentLocalBodies'] = District::with('localBodies')->findOrFail($this->userDetail['permanent_district_id'])->localBodies;
            $this->address['permanentDistrict'] = $this->address['permanentDistricts']->firstWhere('id', $this->userDetail['permanent_district_id']);
        }
        if (!empty($this->userDetail['permanent_local_body_id'])) {
            $this->address['permanentWards'] = LocalBody::findOrFail($this->userDetail['permanent_local_body_id'])->ward_no;
            $this->address['permanentLocalBody'] = $this->address['permanentLocalBodies']->firstWhere('id', $this->userDetail['permanent_local_body_id']);
        }
    }

    public function checkTemporaryAddress(): void
    {
        if (!empty($this->userDetail['temporary_province_id'])) {
            $this->address['temporaryDistricts'] = Province::with('districts')->findOrFail($this->userDetail['temporary_province_id'])->districts;
            $this->address['temporaryProvince'] = $this->provinces->firstWhere('id', $this->userDetail['temporary_province_id']);
        }
        if (!empty($this->userDetail['temporary_district_id'])) {
            $this->address['temporaryLocalBodies'] = District::with('localBodies')->findOrFail($this->userDetail['temporary_district_id'])->localBodies;
            $this->address['temporaryDistrict'] = $this->address['temporaryDistricts']->firstWhere('id', $this->userDetail['temporary_district_id']);
        }
        if (!empty($this->userDetail['temporary_local_body_id'])) {
            $this->address['temporaryWards'] = LocalBody::findOrFail($this->userDetail['temporary_local_body_id'])->ward_no;
            $this->address['temporaryLocalBody'] = $this->address['temporaryLocalBodies']->firstWhere('id', $this->userDetail['temporary_local_body_id']);
        }
    }

    public function checkSameAsPermanentAddress(): void
    {
        $this->is_same_as_permanent = !$this->is_same_as_permanent;

        if ($this->is_same_as_permanent) {
            $this->address['temporaryDistricts'] = $this->address['permanentDistricts'] ?? [];
            $this->address['temporaryLocalBodies'] = $this->address['permanentLocalBodies'] ?? [];
            $this->address['temporaryWards'] = $this->address['permanentWards'] ?? [];
            $this->userDetail['temporary_province_id'] = $this->userDetail['permanent_province_id'] ?? null;
            $this->userDetail['temporary_district_id'] = $this->userDetail['permanent_district_id'] ?? null;
            $this->userDetail['temporary_local_body_id'] = $this->userDetail['permanent_local_body_id'] ?? null;
            $this->userDetail['temporary_ward'] = $this->userDetail['permanent_ward'] ?? null;
            $this->userDetail['temporary_tole'] = $this->userDetail['permanent_tole'] ?? null;
        } else {
            $this->address['temporaryDistricts'] = [];
            $this->address['temporaryLocalBodies'] = [];
            $this->address['temporaryWards'] = [];
            $this->userDetail['temporary_province_id'] = null;
            $this->userDetail['temporary_district_id'] = null;
            $this->userDetail['temporary_local_body_id'] = null;
            $this->userDetail['temporary_ward'] = null;
            $this->userDetail['temporary_tole'] = null;
        }
    }

    public function checkOrganizationAddress(): void
    {
        if (!empty($this->organizationDetail['province_id'])) {
            $this->address['organizationDistricts'] = Province::with('districts')->findOrFail($this->organizationDetail['province_id'])->districts;
            $this->address['organizationProvince'] = $this->provinces->firstWhere('id', $this->organizationDetail['province_id']);
        }
        if (!empty($this->organizationDetail['district_id'])) {
            $this->address['organizationLocalBodies'] = District::with('localBodies')->findOrFail($this->organizationDetail['district_id'])->localBodies;
            $this->address['organizationDistrict'] = $this->address['organizationDistricts']->firstWhere('id', $this->organizationDetail['district_id']);
        }
        if (!empty($this->organizationDetail['local_body_id'])) {
            $this->address['organizationWards'] = LocalBody::findOrFail($this->organizationDetail['local_body_id'])->ward_no;
            $this->address['organizationLocalBody'] = $this->address['organizationLocalBodies']->firstWhere('id', $this->organizationDetail['local_body_id']);
        }
    }

    public function render(): Factory|View|Application
    {
        $this->checkPermanentAddress();
        $this->checkOrganizationAddress();
        $this->checkTemporaryAddress();

        if (!empty($this->userDetail['citizenship_issued_district'])) {
            $this->address['citizenshipIssuedDistrict'] = $this->districts->firstWhere('id', $this->userDetail['citizenship_issued_district']);
        }

        return view('emap::livewire.organization-register-livewire');
    }

    private function calculateProgressPercentage()
    {
        $this->reset('progressPercentage');
        $this->progressPercentage = $this->currentStep / ($this->is_organization === "1" ? 7 : 5) * 100;
    }
}
