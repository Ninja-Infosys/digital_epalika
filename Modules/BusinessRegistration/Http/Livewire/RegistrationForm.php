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
use Modules\BusinessRegistration\Entities\ProprietorDetail;

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

    public $wards = 0;

    public $objectTransactions = [];

    public $businessPurposes = [];

    public $investmentRevenues = [];

    public $threeGenerationDetails = [];

    public $partnerDetails = [];

    public $permanent_provinces = [];

    public $permanent_districts = [];

    public $all_districts = [];

    public $permanent_localBodies = [];

    public $permanent_wards = '';

    public $businessNatures = [];

    public $dbBusinessPurposes = [];

    public array $form = [
        'name' => null,
        'business_type' => null,
        'gender' => null,
        'house_no' => null,
        'phone' => null,
        'account_no' => null,
        'national_card_no' => null,
        'education_qualification' => null,
        'object_transaction_id' => null,
        'investment_revenues_id' => null,
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
        'business_nature' => null,
        'establish_year' => null,
        'registration_date' => null,
        'pan_no' => null,
        'amount_cost' => null,
        'source_of_capital' => null,
        'purpose' => [],
        'employment' => null,
        'house_owner_name' => null,
        'house_owner_phone' => null,
        'house_owner_address' => null,
        'house_owner_monthly_rent' => null,
        'photo' => null,
        'citizenship_back' => null,
        'citizenship_front' => null,
        'company_registration' => null,
        'tax_pay_file' => null,
        'signature' => null,
        'thumb' => null,
        'threeGenerationDetails' => [],
        'partnerDetails' => [],
        'registeredBusinesses' => [],
        'is_rent' => 0,
        'is_registered' => 0,
        'is_confirmed' => null,
        'length' => null,
        'width' => null,
        'square' => 0,

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
        $this->businessPurposes = BusinessPurpose::all();
        $this->objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();
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

    protected array $firstStepValidations = [
        'form.name' => ['required', 'string', 'max:255'],
        'form.business_type' => ['required', 'string'],
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
        'form.issue_district_id' => ['nullable'],
        'form.permanent_province_id' => ['nullable'],
        'form.permanent_district_id' => ['nullable'],
        'form.permanent_local_body_id' => ['nullable'],
        'form.permanent_ward_no' => ['nullable'],
        'form.permanent_way' => ['nullable'],
        'form.permanent_tole' => ['nullable'],
        'form.threeGenerationDetails' => ['nullable', 'array'],
        'form.threeGenerationDetails.*.relation' => ['nullable', 'string'],
        'form.threeGenerationDetails.*.name' => ['nullable', 'string'],
        'form.threeGenerationDetails.*.name_en' => ['nullable', 'string'],
        'form.threeGenerationDetails.*.citizenship_no' => ['nullable', 'string'],
        'form.threeGenerationDetails.*.mobile_no' => ['nullable', 'string'],
    ];

    protected array $secondStepValidations = [
        'form.is_rent' => ['nullable'],
        'form.is_registered' => ['nullable'],
        'form.business_detail_name' => ['nullable'],
        'form.business_detail_name_en' => ['nullable'],
        'form.business_nature' => ['required'],
        'form.establish_year' => ['nullable', 'numeric', 'digits:4'],
        'form.registration_date' => ['nullable'],
        'form.pan_no' => ['nullable'],
        'form.object_transaction_id' => ['nullable'],
        'form.investment_revenue_id' => ['nullable'],
        'form.amount_cost' => ['nullable'],
        'form.source_of_capital' => ['nullable'],
        'form.employment' => ['nullable'],
        'form.house_owner_name' => ['required_if:form.is_rent,1'],
        'form.house_owner_phone' => ['required_if:form.is_rent,1'],
        'form.house_owner_address' => ['required_if:form.is_rent,1'],
        'form.house_owner_monthly_rent' => ['required_if:form.is_rent,1'],
        'form.province_id' => ['nullable'],
        'form.district_id' => ['nullable'],
        'form.local_body_id' => ['nullable'],
        'form.ward_no' => ['nullable'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
        'form.purpose' => ['nullable', 'array'],
        'form.partnerDetails' => ['required_if:form.business_nature,partnership', 'array'],
        'form.partnerDetails.*.relation' => ['nullable'],
        'form.partnerDetails.*.name' => ['nullable'],
        'form.partnerDetails.*.name_en' => ['nullable'],
        'form.partnerDetails.*.citizenship_no' => ['nullable'],
        'form.partnerDetails.*.mobile_no' => ['nullable'],
        'form.registeredBusinesses' => ['nullable', 'array'],
        'form.registeredBusinesses.*.registration_no' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.business_name' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.registration_date' => ['required_if:form.is_registered,1'],
        'form.registeredBusinesses.*.active' => ['required_if:form.is_registered,1'],

    ];

    protected array $thirdStepValidations = [
        'form.photo' => ['nullable'],
        'form.citizenship_back' => ['nullable'],
        'form.citizenship_front' => ['nullable'],
        'form.company_registration' => ['nullable'],
        'form.tax_pay_file' => ['nullable'],
        'form.signature' => ['nullable'],
        'form.thumb' => ['nullable'],
    ];

    protected array $fourthStepValidations = [

        'form.length' => ['nullable'],
        'form.width' => ['nullable'],
        'form.square' => ['nullable'],
    ];

    protected array $fifthStepValidations = [
        'form.is_confirmed' => ['required'],
    ];

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

    public function rules(): array
    {
        return match ($this->currentStep) {
            1 => $this->firstStepValidations,
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            default => array_merge($this->firstStepValidations, $this->secondStepValidations, $this->thirdStepValidations, $this->fourthStepValidations, $this->fifthStepValidations),
        };
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();
        $businessDetails = DB::transaction(function () {

            $businessDetail = BusinessDetail::create([
                'business_type' => $this->form['business_type'] ?? null,
                'business_detail_name' => $this->form['business_detail_name'] ?? null,
                'investment_revenue_id' => $this->form['investment_revenue_id'] ?? null,
                'is_rent' => $this->form['is_rent'] ?? null,
                'is_registered' => $this->form['is_registered'] ?? null,
                'submission_no' => time(),
                'business_detail_name_en' => $this->form['business_detail_name_en'] ?? null,
                'business_nature' => $this->form['business_nature'] ?? null,
                'establish_year' => $this->form['establish_year'] ?? null,
                'registration_date' => $this->form['registration_date'] ?? null,
                'pan_no' => $this->form['pan_no'] ?? null,
                'amount_cost' => $this->form['amount_cost'] ?? 0,
                'source_of_capital' => $this->form['source_of_capital'] ?? null,
                'employment' => $this->form['employment'] ?? null,
                'house_owner_name' => $this->form['house_owner_name'] ?? null,
                'house_owner_phone' => $this->form['house_owner_phone'] ?? null,
                'house_owner_address' => $this->form['house_owner_address'] ?? null,
                'house_owner_monthly_rent' => $this->form['house_owner_monthly_rent'] ?? null,
                'province_id' => $this->form['province_id'] ?? null,
                'district_id' => $this->form['district_id'] ?? null,
                'local_body_id' => $this->form['local_body_id'] ?? null,
                'ward_no' => $this->form['ward_no'] ?? null,
                'way' => $this->form['way'] ?? null,
                'tole' => $this->form['tole'] ?? null,
                'photo' => $this->form['photo'] ?? null,
                'citizenship_front' => $this->form['citizenship_front'] ?? null,
                'citizenship_back' => $this->form['citizenship_back'] ?? null,
                'company_registration' => $this->form['company_registration'] ?? null,
                'tax_pay_file' => $this->form['tax_pay_file'] ?? null,
                'signature' => $this->form['signature'] ?? null,
                'thumb' => $this->form['thumb'] ?? null,
                'length' => $this->form['length'] ?? 0,
                'width' => $this->form['width'] ?? 0,
                'square' => $this->form['square'] ?? 0,
            ]);

            $proprietorDetail = $businessDetail->proprietorDetail()->create([
                'name' => $this->form['name'] ?? null,
                'citizenship_no' => $this->form['citizenship_no'] ?? null,
                'issue_date' => $this->form['issue_date'] ?? null,
                'issue_district_id' => $this->form['issue_district_id'] ?? null,
                'phone' => $this->form['phone'] ?? null,
                'email' => $this->form['email'] ?? null,
                'province_id' => $this->form['permanent_province_id'] ?? null,
                'district_id' => $this->form['permanent_district_id'] ?? null,
                'local_body_id' => $this->form['permanent_local_body_id'] ?? null,
                'ward_no' => $this->form['permanent_ward_no'] ?? null,
                'way' => $this->form['permanent_way'] ?? null,
                'tole' => $this->form['permanent_tole'] ?? null,
                'house_no' => $this->form['house_no'] ?? null,
                'account_no' => $this->form['account_no'] ?? null,
                'national_card_no' => $this->form['national_card_no'] ?? null,
                'gender' => $this->form['gender'] ?? null,
                'education_qualification' => $this->form['education_qualification'] ?? null,
                'occupation' => $this->form['occupation'] ?? null,
            ]);



            $businessDetail->businessPurposes()->attach($this->form['purpose'] ?? null);

            foreach ($this->form['threeGenerationDetails'] as $threeGenerationDetail) {
                $proprietorDetail->threeGenerationDetails()->create([
                    'relation' => $threeGenerationDetail['relation'] ?? null,
                    'name' => $threeGenerationDetail['name'] ?? null,
                    'name_en' => $threeGenerationDetail['name_en'] ?? null,
                    'citizenship_no' => $threeGenerationDetail['citizenship_no'] ?? null,
                    'mobile_no' => $threeGenerationDetail['mobile_no'] ?? null,
                ]);
            }

            foreach ($this->form['partnerDetails'] as $partnerDetail) {
                $businessDetail->partnerDetails()->create([
                    'relation' => $partnerDetail['relation'] ?? null,
                    'name' => $partnerDetail['name'] ?? null,
                    'citizenship_no' => $partnerDetail['citizenship_no'] ?? null,
                    'mobile_no' => $partnerDetail['mobile_no'] ?? null,
                ]);
            }

            foreach ($this->form['registeredBusinesses'] as $registeredBusiness) {
                $businessDetail->registeredBusinesses()->create([
                    'registration_no' => $registeredBusiness['registration_no'] ?? null,
                    'business_name' => $registeredBusiness['business_name'] ?? null,
                    'registration_date' => $registeredBusiness['registration_date'] ?? null,
                    'active' => $registeredBusiness['active'] ?? null,
                ]);
            }


            return $businessDetail;
        });

        $this->dispatchBrowserEvent('alert_message', [
            'type' => 'success',
            'title' => 'धन्यबाद',
            'text' => 'तपाइको व्यवसाय सफलता पुर्बक दर्ता भयो',
        ]);

        $this->emit('productStore');

        $this->reset('form');

        return redirect()->route('businessRegistration.detail.print', $businessDetails->id);
    }

    public function documentsArrayIncrement(): void
    {
        $this->form['threeGenerationDetails'][] = [];
    }

    public function documentsArrayDecrement($index): void
    {
        unset($this->form['threeGenerationDetails'][$index]);
        $this->form['threeGenerationDetails'] = array_values($this->form['threeGenerationDetails']);
    }

    public function partnerDetailIncrement(): void
    {
        $this->form['partnerDetails'][] = [];
    }

    public function partnerDetailDecrement($index): void
    {
        unset($this->form['partnerDetails'][$index]);
        $this->form['partnerDetails'] = array_values($this->form['partnerDetails']);
    }

    public function registeredBusinessArrayIncrement(): void
    {
        $this->form['registeredBusinesses'][] = [];
    }

    public function registeredBusinessArrayDecrement($index): void
    {
        unset($this->form['registeredBusinesses'][$index]);
        $this->form['registeredBusinesses'] = array_values($this->form['registeredBusinesses']);
    }

    public function render(): Factory|View|Application
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

        if (!empty($this->form['object_transaction_id'])) {
            $this->investmentRevenues = InvestmentRevenue::where('object_transaction_id', $this->form['object_transaction_id'])->get();
        }

        //temporary address preview
        if (!empty($this->form['district_id'])) {
            $this->district_preview = District::find($this->form['district_id']);
        }
        if (!empty($this->form['province_id'])) {
            $this->province_preview = Province::find($this->form['province_id']);
        }
        if (!empty($this->form['local_body_id'])) {
            $this->localBody_preview = LocalBody::find($this->form['local_body_id']);
        }

        //permanent address preview

        if (!empty($this->form['permanent_province_id'])) {
            $this->permanent_province_preview = Province::find($this->form['permanent_province_id']);
        }
        if (!empty($this->form['permanent_district_id'])) {
            $this->permanent_district_preview = District::find($this->form['permanent_district_id']);
        }
        if (!empty($this->form['permanent_local_body_id'])) {
            $this->permanent_localBody_preview = LocalBody::find($this->form['permanent_local_body_id']);
        }

        if (!empty($this->form['issue_district_id'])) {
            $this->issue_district_preview = District::find($this->form['issue_district_id']);
        }
        if (!empty($this->form['purpose'])) {
            $this->dbBusinessPurposes = BusinessPurpose::whereIn('id', $this->form['purpose'])->get();
        }
        if (!empty($this->form['length'] && $this->form['width'])) {
            $this->form['square'] = $this->form['length'] * $this->form['width'];
        } else {
            $this->form['square'] = '';
        }

        return view('businessregistration::livewire.registration-form');
    }
}
