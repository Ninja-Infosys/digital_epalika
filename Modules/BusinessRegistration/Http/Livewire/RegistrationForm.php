<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\BusinessNature;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $province_id = '';
    public $district_id = '';
    public $local_body_id = '';
    public $ward_no = '';

    public int $currentStep = 1;

    public bool $is_show = false;

    public $threeGenerationDetails = [];
    public $partnerDetails = [];
    public $provinces = [];
    public $districts = [];
    public $all_districts = [];
    public $localBodies = [];
    public $wards = '';

    public $businessNatures = [];

    public array $form = [
        'name' => null,
        'gender' => null,
        'house_no' => null,
        'phone' =>null,
        'account_no' => null,
        'national_card_no' =>null,
        'education_qualification' => null,
        'occupation' =>null,
        'email' => null,
        'citizenship_no' => null,
        'issue_date' => null,
        'issue_district_id' => null,
        'province_id' =>null,
        'district_id' => null,
        'local_body_id' =>null,
        'way' => null,
        'tole' => null,
        'business_detail_name' => null,
        'business_detail_name_en' =>null,
        'business_nature_id' => null,
        'establish_year' => null,
        'registration_date' => null,
        'pan_no' => ['required'],
        'transaction_object' =>null,
        'amount_cost' => null,
        'source_of_capital' => null,
        'purpose' => null,
        'employment' => null,
        'house_owner_name' => null,
        'house_owner_phone' => null,
        'house_owner_address' =>null,
        'house_owner_monthly_rent' => null,
        'threeGenerationDetails' => [],
        'partnerDetails' => [],
        'is_show'=>0

    ];


    public function mount()
    {
        $this->provinces = Province::all();
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
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
        'form.threeGenerationDetails.*.relation' => ['required', 'string'],
        'form.threeGenerationDetails.*.name' => ['required', 'string'],
        'form.threeGenerationDetails.*.name_en' => ['required', 'string'],
        'form.threeGenerationDetails.*.citizenship_no' => ['required', 'string'],
        'form.threeGenerationDetails.*.mobile_no' => ['required', 'string'],
    ];

    protected array $secondStepValidations = [
        'business_detail_name' => ['required'],
        'business_detail_name_en' => ['required'],
        'business_nature_id' => ['required'],
        'establish_year' => ['required'],
        'registration_date' => ['required'],
        'pan_no' => ['required'],
        'transaction_object' => ['required'],
        'amount_cost' => ['required'],
        'source_of_capital' => ['required'],
        'purpose' => ['required'],
        'employment' => ['required'],
        'house_owner_name' => ['required'],
        'house_owner_phone' => ['required'],
        'house_owner_address' => ['required'],
        'house_owner_monthly_rent' => ['required'],
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
        'form.partnerDetails.*.relation' => ['required', 'string'],
        'form.partnerDetails.*.name' => ['required', 'string'],
        'form.partnerDetails.*.name_en' => ['required', 'string'],
        'form.partnerDetails.*.citizenship_no' => ['required', 'string'],
        'form.partnerDetails.*.mobile_no' => ['required', 'string'],
    ];

    protected array $thirdStepValidations = [

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
