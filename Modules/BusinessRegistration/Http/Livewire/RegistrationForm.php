<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

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
        'permanent_ward_no' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'way' => null,
        'tole' => null,
        'business_detail_name' => null,
        'business_detail_name_en' => null,
        'business_nature_id' => null,
        'establish_year' => null,
        'registration_date' => null,
        'pan_no' => null,
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
        'registeredBusinesses' => [],
        'is_show' => 0,
        'is_registered' => 0

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
        'form.house_no' => ['nullable'],
        'form.phone' => ['required'],
        'form.account_no' => ['nullable'],
        'form.national_card_no' => ['nullable'],
        'form.education_qualification' => ['nullable'],
        'form.occupation' => ['nullable'],
        'form.email' => ['nullable', 'email'],
        'form.citizenship_no' => ['required'],
        'form.issue_date' => ['required'],
        'form.issue_district_id' => ['required'],
        'form.permanent_province_id' => ['required'],
        'form.permanent_district_id' => ['required'],
        'form.permanent_local_body_id' => ['required'],
        'form.permanent_ward_no' => ['required'],
        'form.permanent_way' => ['nullable'],
        'form.permanent_tole' => ['nullable'],
        'form.threeGenerationDetails' => ['required', 'array'],
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
        'form.purpose' => ['nullable'],
        'form.employment' => ['required'],
        'form.house_owner_name' => ['required_if:form.is_show,1'],
        'form.house_owner_phone' => ['required_if:form.is_show,1'],
        'form.house_owner_address' => ['required_if:form.is_show,1'],
        'form.house_owner_monthly_rent' => ['required_if:form.is_show,1'],
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.ward_no' => ['required'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
        'form.partnerDetails.*.relation' => ['nullable', 'string'],
        'form.partnerDetails.*.name' => ['nullable', 'string'],
        'form.partnerDetails.*.name_en' => ['nullable', 'string'],
        'form.partnerDetails.*.citizenship_no' => ['nullable', 'string'],
        'form.partnerDetails.*.mobile_no' => ['nullable', 'string'],
        'form.registeredBusinesses.*.registration_no' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.business_name' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.registration_date' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.active' => ['required_if:form.is_registered,1'],

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
                return array_merge($this->firstStepValidations, $this->secondStepValidations, $this->thirdStepValidations, $this->fourthStepValidations);
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();
//        dd($this->form);
        DB::transaction(function () {
            $proprietorDetails = ProprietorDetail::create([
                'name' => $this->form['name'],
                'citizenship_no' => $this->form['citizenship_no'],
                'issue_date' => $this->form['issue_date'],
                'issue_district_id' => $this->form['issue_district_id'],
                'phone' => $this->form['phone'],
                'email' => $this->form['email'],
                'province_id' => $this->form['permanent_province_id'],
                'district_id' => $this->form['permanent_district_id'],
                'local_body_id' => $this->form['permanent_local_body_id'],
                'ward_no' => $this->form['permanent_ward_no'],
                'way' => $this->form['permanent_way'],
                'tole' => $this->form['permanent_tole'],
                'house_no' => $this->form['house_no'],
                'account_no' => $this->form['account_no'],
                'national_card_no' => $this->form['national_card_no'],
                'gender' => $this->form['gender'],
                'education_qualification' => $this->form['education_qualification'],
                'occupation' => $this->form['occupation'],
            ]);

            $businessDetail = $proprietorDetails->businessDetail()->create([
                'business_detail_name' => $this->form['business_detail_name'],
                'business_detail_name_en' => $this->form['business_detail_name_en'],
                'business_nature_id' => $this->form['business_nature_id'],
                'establish_year' => $this->form['establish_year'],
                'registration_date' => $this->form['registration_date'],
                'pan_no' => $this->form['pan_no'],
                'transaction_object' => $this->form['transaction_object'],
                'amount_cost' => $this->form['amount_cost'],
                'source_of_capital' => $this->form['source_of_capital'],
                'purpose' => $this->form['purpose'],
                'employment' => $this->form['employment'],
                'house_owner_name' => $this->form['house_owner_name'],
                'house_owner_phone' => $this->form['house_owner_phone'],
                'house_owner_address' => $this->form['house_owner_address'],
                'house_owner_monthly_rent' => $this->form['house_owner_monthly_rent'],
                'province_id' => $this->form['province_id'],
                'district_id' => $this->form['district_id'],
                'local_body_id' => $this->form['local_body_id'],
                'ward_no' => $this->form['ward_no'],
                'way' => $this->form['way'],
                'tole' => $this->form['tole'],
            ]);

            foreach ($this->form['threeGenerationDetails'] as $threeGenerationDetail) {
                $proprietorDetails->threeGenerationDetails()->create([
                    'relation' => $threeGenerationDetail['relation'],
                    'name' => $threeGenerationDetail['name'],
                    'name_en' => $threeGenerationDetail['name_en'],
                    'citizenship_no' => $threeGenerationDetail['citizenship_no'],
                    'mobile_no' => $threeGenerationDetail['mobile_no']
                ]);
            }

            foreach ($this->form['partnerDetails'] as $partnerDetail) {
                $businessDetail->partnerDetails()->create([
                    'relation' => $partnerDetail['relation'],
                    'name' => $partnerDetail['name'],
                    'citizenship_no' => $partnerDetail['citizenship_no'],
                    'mobile_no' => $partnerDetail['mobile_no']
                ]);
            }

            foreach ($this->form['registeredBusinesses'] as $registeredBusiness) {
                $businessDetail->registeredBusinesses()->create([
                    'registration_no' => $registeredBusiness['registration_no'],
                    'business_name' => $registeredBusiness['business_name'],
                    'registration_date' => $registeredBusiness['registration_date'],
                    'active' => $registeredBusiness['active']
                ]);
            }
            $proprietorDetails->businessRegisteredFile()->create([
                'photo' => $this->form['photo'],
                'citizen_ship' => $this->form['citizen_ship'],
                'company_registration' => $this->form['company_registration'],
                'tax_pay_file' => $this->form['tax_pay_file'],
                'signature' => $this->form['signature'],
                'thumb' => $this->form['thumb'],
            ]);

            $proprietorDetails->introboard()->create([
                'length' => $this->form['length'],
                'width' => $this->form['width'],
                'square' => $this->form['square'],
            ]);

        });

        $this->reset('form');
        $this->dispatchBrowserEvent('alert_message', [
            'type' => "success",
            'title' => "धन्यबाद",
            'text' => "तपाइको व्यवसाय सफलता पुर्बक दर्ता भयो",
        ]);
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

    public function registeredBusinessArrayIncrement()
    {
        $this->form['registeredBusinesses'][] = [];
    }

    public function registeredBusinessArrayDecrement($index)
    {
        unset($this->form['registeredBusinesses'][$index]);
        $this->form['registeredBusinesses'] = array_values($this->form['registeredBusinesses']);
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

