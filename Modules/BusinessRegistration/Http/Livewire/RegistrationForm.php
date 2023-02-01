<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;

    public $district_preview;

    public $province_preview;

    public $localBody_preview;

    public $issue_district_preview;

    public $permanent_district_preview;

    public $permanent_province_preview;

    public $permanent_localBody_preview;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];

    public $objectTransactions = [];

    public $businessPurposes = [];

    public $investmentRevenues = [];

    public $partners = [];

    public $partnerDetails = [];

    public $permanent_provinces = [];

    public $permanent_districts = [];

    public $all_districts = [];

    public $permanent_localBodies = [];

    public $permanent_wards = '';

    public $businessNatures = [];

    public $dbBusinessPurposes = [];

    public array $form = [
        //first step
        'name' => null,
        'name_en' => null,
        'address' => null,
        'address_en' => null,
        'business_nature_id' => null,
        'object_transaction_id' => null,
        'working_capital' => null,
        'fixed_capital' => null,
        'investment' => null,
        'purpose' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'way' => null,
        'tole' => null,
        'is_rent' => 0,
        'house_owner_name' => null,
        'house_owner_phone' => null,
        'house_owner_address' => null,
        'house_owner_monthly_rent' => null,
        //second step
        'length' => null,
        'width' => null,
        'application_date' => null,
        'application_date_en' => null,
        'rent_agreement' => null,
        'land_ownership_certificate' => null,
        'ward_recommendation' => null,
        'embassy_document' => null,
        'registration_document' => null,
        'license' => null,
        'tax_document' => null,

        //third step
        'partners' => []

    ];


    public function mount()
    {
        $this->partnerArrayIncrement();
        $officeSetting = OfficeSetting::first();
        $this->permanent_provinces = Province::all();
        $this->provinces = Province::all();
        $this->form['province_id'] = $officeSetting->province_id;
        $this->form['district_id'] = $officeSetting->district_id;
        $this->form['local_body_id'] = $officeSetting->local_body_id;
        $this->all_districts = District::all();
        $this->businessNatures = BusinessNature::all();
        $this->objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();
    }

    protected array $firstStepValidations = [
        'form.name' => ['required'],
        'form.name_en' => ['required'],
        'form.address' => ['required'],
        'form.address_en' => ['required'],
        'form.business_nature_id' => ['required', 'exists:business_natures,id'],
        'form.object_transaction_id' => ['required', 'exists:object_transactions,id'],
        'form.working_capital' => ['required'],
        'form.fixed_capital' => ['required'],
        'form.investment' => ['required'],
        'form.purpose' => ['required'],
        'form.province_id' => ['required', 'exists:provinces,id'],
        'form.district_id' => ['required', 'exists:districts,id'],
        'form.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.ward_no' => ['nullable', 'integer'],
        'form.way' => ['required', 'string'],
        'form.tole' => ['required', 'string'],
        'form.is_rent' => ['required', 'boolean'],
        'form.house_owner_name' => ['required_if:form.is_rent,1'],
        'form.house_owner_phone' => ['required_if:form.is_rent,1'],
        'form.house_owner_address' => ['required_if:form.is_rent,1'],
        'form.house_owner_monthly_rent' => ['required_if:form.is_rent,1'],
    ];

    protected array $secondStepValidations = [
        'form.length' => ['required'],
        'form.width' => ['required'],
        'form.application_date' => ['required'],
        'form.application_date_en' => ['required'],
        'form.rent_agreement' => ['nullable'],
        'form.land_ownership_certificate' => ['nullable'],
        'form.ward_recommendation' => ['nullable'],
        'form.embassy_document' => ['nullable'],
        'form.registration_document' => ['nullable'],
        'form.license' => ['nullable'],
        'form.tax_document' => ['nullable'],
    ];

    protected array $thirdStepValidations = [

        'form.partners' => ['required', 'array'],
        'form.partners.*.name' => ['required'],
        'form.partners.*.name_en' => ['required'],
        'form.partners.*.citizenship_no' => ['required'],
        'form.partners.*.issue_date' => ['required'],
        'form.partners.*.phone' => ['required'],
        'form.partners.*.email' => ['required'],
        'form.partners.*.house_no' => ['required'],
        'form.partners.*.account_no' => ['required'],
        'form.partners.*.national_card_no' => ['required'],
        'form.partners.*.gender' => ['required'],
        'form.partners.*.education_qualification' => ['required'],
        'form.partners.*.occupation' => ['required'],
        'form.partners.*.father_name' => ['required'],
        'form.partners.*.grandfather_name' => ['required'],
        'form.partners.*.photo' => ['required'],
        'form.partners.*.signature' => ['required'],
        'form.partners.*.citizenship_front' => ['required'],
        'form.partners.*.citizenship_back' => ['required'],
        'form.partners.*.position' => ['required'],


    ];


    public function rules(): array
    {
        return match ($this->currentStep) {
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            default => $this->firstStepValidations,
        };
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep($step): void
    {
        $this->validate();
        $this->currentStep = $step;
    }

    public function backStep($step): void
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        $this->validate();
        $businessDetail = DB::transaction(function () {
            $businessDetail = BusinessDetail::create($this->form + [
                    'submission_no' => time(),
                ]);
            foreach ($this->form['partners'] as $partner) {
                $businessDetail->partners()->create($partner);
            }
            return $businessDetail;
        });
        $this->dispatchBrowserEvent('alert_message', [
            'type' => 'success',
            'title' => 'धन्यबाद',
            'text' => 'तपाइको व्यवसाय सफलता पुर्बक दर्ता भयो',
        ]);
        $this->reset('form');
        return redirect()->route('businessRegistration.detail.print', $businessDetail->id);

    }

    public function partnerArrayIncrement(): void
    {
        $this->form['partners'][] = [];
    }

    public function partnerArrayDecrement($index): void
    {
        unset($this->form['partners'][$index]);
        $this->form['partners'] = array_values($this->form['partners']);
    }


    public function render(): Factory|View|Application
    {


        if (!empty($this->form['province_id'])) {
            $this->districts = Province::with('districts')->findOrFail($this->form['province_id'])->districts;
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = District::with('localBodies')->findOrFail($this->form['district_id'])->localBodies;
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = LocalBody::findOrFail($this->form['local_body_id'])->ward_no;
        }


        //permanent address preview

//        if (!empty($this->form['permanent_province_id'])) {
//            $this->permanent_province_preview = Province::find($this->form['permanent_province_id']);
//        }
//        if (!empty($this->form['permanent_district_id'])) {
//            $this->permanent_district_preview = District::find($this->form['permanent_district_id']);
//        }
//        if (!empty($this->form['permanent_local_body_id'])) {
//            $this->permanent_localBody_preview = LocalBody::find($this->form['permanent_local_body_id']);
//        }
//
//        if (!empty($this->form['issue_district_id'])) {
//            $this->issue_district_preview = District::find($this->form['issue_district_id']);
//        }

//        if (!empty($this->form['length'] && $this->form['width'])) {
//            $this->form['square'] = $this->form['length'] * $this->form['width'];
//        } else {
//            $this->form['square'] = '';
//        }

        if ($this->form['is_rent'] == '0') {
            $this->form['house_owner_name'] = null;
            $this->form['house_owner_phone'] = null;
            $this->form['house_owner_address'] = null;
            $this->form['house_owner_monthly_rent'] = null;
        }

        return view('businessregistration::livewire.registration-form');
    }

    public function messages(): array
    {
        return [
            'form.name.required' => ['नाम आवश्यक छ'],
            'form.business_type.required' => ['आवश्यक छ'],
            'form.is_confirmed.required' => ['बिवरण पुष्टि गर्नुहोस्'],
            'form.gender.required' => ['लिंग आबश्यक छ '],
            'form.house_no.required' => ['घर न. आबश्यक छ '],
            'form.phone.required' => ['फोन आबश्यक छ '],
            'form.account_no.required' => ['खाता न. आबश्यक छ '],
            'form.national_card_no.required' => ['राष्ट्रिय परिचय पत्र न. आबश्यक छ '],
            'form.education_qualification.required' => ['शैक्षिक योग्यता आबश्यक छ '],
            'form.occupation.required' => ['पेशा आबश्यक छ '],
            'form.email.required' => ['इमेल आबश्यक छ '],
            'form.email.email' => ['इमेल फर्म मा हुनुपर्छ '],
            'form.citizenship_no.required' => ['नागरिकता न. आबश्यक छ '],
            'form.issue_date.required' => ['जारी मिति आबश्यक छ '],
            'form.issue_district_id.required' => ['जारी गर्ने जिल्ला आबश्यक छ '],
            'form.permanent_province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.permanent_district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.permanent_local_body_id.required' => ['स्थानीय निकाय आबश्यक छ '],
            'form.permanent_ward_no.required' => ['वार्ड न. आबश्यक छ '],
            'form.permanent_way.required' => ['मार्ग आबश्यक छ '],
            'form.permanent_tole.required' => ['टोल आबश्यक छ '],
            'form.threeGenerationDetails.required' => ['तिन पुस्ते विवरण आबश्यक छ '],
            'form.threeGenerationDetails.*.relation.required' => [' नाता आबश्यक छ '],
            'form.threeGenerationDetails.*.name.required' => [' नाम आबश्यक छ '],
            'form.threeGenerationDetails.*.name_en.required' => [' नाम आबश्यक छ '],
            'form.threeGenerationDetails.*.citizenship_no.required' => [' नागरिकता न. आबश्यक छ '],
            'form.threeGenerationDetails.*.mobile_no.required' => ['मोबाइल न. आबश्यक छ '],
            'form.business_detail_name.required' => ['ब्यबसायको नाम आबश्यक छ '],
            'form.business_detail_name_en.required' => ['ब्यबसायको नाम आबश्यक छ '],
            'form.business_nature.required' => ['ब्यबसायको प्रकृति आबश्यक छ '],
            'form.establish_year.required' => ['स्थापना मिति आबश्यक छ '],
            'form.registration_date.required' => ['दर्ता मिति आबश्यक छ '],
            'form.pan_no.required' => ['पाना न. आबश्यक छ '],
            'form.transaction_object.required' => ['लेनदेन वस्तु आबश्यक छ '],
            'form.amount_cost.cost' => ['लागत आबश्यक छ '],
            'form.source_of_capital.required' => ['पुँजीको स्रोत आबश्यक छ '],
            'form.purpose.required' => ['उधेश्य आबश्यक छ '],
            'form.employment.required' => ['रोजगारी आबश्यक छ '],
            'form.house_owner_name.required' => ['घर धनि को नाम आबश्यक छ '],
            'form.house_owner_phone.required' => ['घर धनिको फोन आबश्यक छ '],
            'form.house_owner_address.required' => ['घर धनि को ठेगाना आबश्यक छः '],
            'form.house_owner_monthly_rent.required' => ['मासिक घर भाडा आबश्यक छ '],
            'form.province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.local_body_id.required' => ['स्थानीय निकाय  आबश्यक छ '],
            'form.ward_no.required' => ['वार्ड न. आबस्यक छ'],
            'form.way.required' => ['मार्ग आबश्यक छ '],
            'form.tole.required' => ['टोल आबश्यक छ '],
            'form.partnerDetails.*.relation.required' => ['साथीको नाता आबश्यक छ '],
            'form.partnerDetails.*.name.required' => ['नाम आबश्यक छ '],
            'form.partnerDetails.*.name_en.required' => ['नाम आबश्यक छ '],
            'form.partnerDetails.*.citizenship_no.required' => ['नागरिकता न. आबश्यक छ '],
            'form.partnerDetails.*.mobile_no.required' => ['मोबाइल न. आबश्यक छ '],
            'form.registeredBusinesses.*.registration_no.required' => ['दर्ता न. आबश्यक छ '],
            'form.registeredBusinesses.*.business_name.required' => ['ब्यबसाय को नाम आबश्यक छ '],
            'form.registeredBusinesses.*.registration_date.required' => ['दर्ता मिति आबश्यक छ '],
            'form.registeredBusinesses.*.active.required' => ['ब्यबसाय सक्रिय आबस्यक छ '],
            'form.photo.required' => ['फोटो आबश्यक छ '],
            'form.citizenship_front.required' => ['नागरिकता आबश्यकता छ '],
            'form.citizenship_back.required' => ['नागरिकता आबश्यकता छ '],
            'form.company_registration.required' => ['कम्पनि दर्ता आबश्यक छ '],
            'form.tax_pay_file.required' => ['कर तिरेको फाइल आबश्यक छ '],
            'form.signature.required' => ['हस्ताक्षर आबश्यक छ '],
            'form.thumb.required' => ['औंलाको छाप आबश्यक छ '],

        ];
    }
}
