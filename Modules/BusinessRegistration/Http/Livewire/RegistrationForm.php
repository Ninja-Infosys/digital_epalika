<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\BusinessNature;

class RegistrationForm extends Component
{
    use WithFileUploads;


    public int $currentStep = 1;

    public $provices = [];
    public $districts = [];
    public $localBodies = [];
    public $wards = 0;


    public $threeGenerationDetails = [];
    public $partnerDetails = [];
    public $permanent_provinces = [];
    public $permanent_districts = [];
    public $all_districts = [];
    public $permanent_localBodies = [];
    public $permanent_wards = '';

    public $businessNatures = [];

    public array $form = [
        'name' => null,
        'gender' => null,
        'house_no' => null,
        'phone' => null,
        'account_no' => null,
        'national_card_no' => null,
        'education_qualification' => null,
        'occupation' => null,
        'email' => null,
        'citizenship_no' => null,
        'issue_date' => null,
        'issue_district_id' => null,
        'permanent_province_id' => null,
        'permanent_district_id' => null,
        'permanent_local_body_id' => null,
        'permanent_way' => null,
        'permanent_tole' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'way' => null,
        'tole' => null,
        'business_detail_name' => null,
        'business_detail_name_en' => null,
        'business_nature_id' => null,
        'establish_year' => null,
        'registration_date' => null,
        'pan_no' => ['required'],
        'transaction_object' => null,
        'amount_cost' => null,
        'source_of_capital' => null,
        'purpose' => null,
        'employment' => null,
        'house_owner_name' => null,
        'house_owner_phone' => null,
        'house_owner_address' => null,
        'house_owner_monthly_rent' => null,
        'photo' => null,
        'citizen_ship' => null,
        'company_registration' => null,
        'tax_pay_file' => null,
        'signature' => null,
        'thumb' => null,
        'threeGenerationDetails' => [],
        'partnerDetails' => [],
        'is_show' => 0

    ];


    public function mount()
    {
        $officeSetting = OfficeSetting::first();
        $this->permanent_provinces = Province::all();
        $this->provinces = Province::all();
        $this->form['province_id'] = $officeSetting->province_id;
        $this->form['district_id'] = $officeSetting->district_id;
        $this->form['local_body_id'] = $officeSetting->local_body_id;
        $this->all_districts = District::all();
        $this->businessNatures = BusinessNature::all();
    }

    public function nextStep($step)
    {
        $this->validate();
        $this->currentStep = $step;
    }

    public function backStep($step)
    {
        $this->currentStep = $step;
    }


    protected array $firstStepValidations = [
        'form.name' => ['required', 'string', 'max:255'],
        'form.gender' => ['required'],
        'form.house_no' => ['required'],
        'form.phone' => ['required'],
        'form.account_no' => ['required'],
        'form.national_card_no' => ['required'],
        'form.education_qualification' => ['required'],
        'form.occupation' => ['required'],
        'form.email' => ['nullable', 'email'],
        'form.citizenship_no' => ['required'],
        'form.issue_date' => ['required'],
        'form.issue_district_id' => ['required'],
        'form.permanent_province_id' => ['required'],
        'form.permanent_district_id' => ['required'],
        'form.permanent_local_body_id' => ['required'],
        'form.permanent_way' => ['nullable'],
        'form.permanent_tole' => ['nullable'],
        'form.threeGenerationDetails.*.relation' => ['required', 'string'],
        'form.threeGenerationDetails.*.name' => ['required', 'string'],
        'form.threeGenerationDetails.*.name_en' => ['required', 'string'],
        'form.threeGenerationDetails.*.citizenship_no' => ['required', 'string'],
        'form.threeGenerationDetails.*.mobile_no' => ['required', 'string'],
    ];

    protected array $secondStepValidations = [
        'form.business_detail_name' => ['required'],
        'form.business_detail_name_en' => ['required'],
        'form.business_nature_id' => ['nullable'],
        'form.establish_year' => ['required'],
        'form.registration_date' => ['required'],
        'form.pan_no' => ['required'],
        'form.transaction_object' => ['nullable'],
        'form.amount_cost' => ['required'],
        'form.source_of_capital' => ['nullable'],
        'form.purpose' => ['required'],
        'form.employment' => ['required'],
        'form.house_owner_name' => ['required_if:form.is_show,1'],
        'form.house_owner_phone' => ['required_if:form.is_show,1'],
        'form.house_owner_address' => ['required_if:form.is_show,1'],
        'form.house_owner_monthly_rent' => ['required_if:form.is_show,1'],
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
        'form.partnerDetails.*.relation' => ['nullable', 'string'],
        'form.partnerDetails.*.name' => ['nullable', 'string'],
        'form.partnerDetails.*.name_en' => ['nullable', 'string'],
        'form.partnerDetails.*.citizenship_no' => ['nullable', 'string'],
        'form.partnerDetails.*.mobile_no' => ['nullable', 'string'],
    ];

    protected array $thirdStepValidations = [
        'form.photo' => ['required'],
        'form.citizen_ship' => ['required'],
        'form.company_registration' => ['required'],
        'form.tax_pay_file' => ['required'],
        'form.signature' => ['required'],
        'form.thumb' => ['required'],
    ];

    protected array $fourthStepValidations = [

        'form.length' => ['required'],
        'form.width' => ['required'],
        'form.square' => ['required'],
        ];

    public function rules()
    {
        switch ($this->currentStep) {
            case 1:
                {
                    return $this->firstStepValidations;
                }
                break;
            case 2:
                {
                    return $this->secondStepValidations;
                }
                break;
            case 3:
                {
                    return $this->thirdStepValidations;
                }
                break;
            case 4:
                {
                    return $this->fourthStepValidations;
                }
                break;
            default:
            {
                return array_merge($this->firstStepValidations, $this->secondStepValidations);
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

    }

    public function documentsArrayIncrement()
    {
        $this->form['threeGenerationDetails'][] = [];
    }

    public function documentsArrayDecrement($index)
    {
        unset($this->form['threeGenerationDetails'][$index]);
        $this->form['threeGenerationDetails'] = array_values($this->form['threeGenerationDetails']);
    }

    public function partnerDetailIncrement()
    {
        $this->form['partnerDetails'][] = [];
    }

    public function partnerDetailDecrement($index)
    {
        unset($this->form['partnerDetails'][$index]);
        $this->form['partnerDetails'] = array_values($this->form['partnerDetails']);
    }


    public function render()
    {
        if (!empty($this->form['permanent_province_id'])) {
            $this->permanent_districts = Province::with('districts')->findOrFail($this->form['permanent_province_id'])->districts;
        }
        if (!empty($this->form['permanent_district_id'])) {
            $this->permanent_localBodies = District::with('localBodies')->findOrFail($this->form['permanent_district_id'])->localBodies;
        }
        if (!empty($this->form['permanent_local_body_id'])) {
            $this->permanent_wards = LocalBody::findOrFail($this->form['permanent_local_body_id'])->wards;
        }

        if (!empty($this->form['province_id'])) {
            $this->districts = Province::with('districts')->findOrFail($this->form['province_id'])->districts;
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = District::with('localBodies')->findOrFail($this->form['district_id'])->localBodies;
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = LocalBody::findOrFail($this->form['local_body_id'])->wards;
        }
        return view('businessregistration::livewire.registration-form');
    }
}

