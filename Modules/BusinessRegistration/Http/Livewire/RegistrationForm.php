<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
    public float $progressPercentage = 0;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];

    public $objectTransactions = [];

    public $businessNatures = [];
    public $partners = [];
    public $registeredBusinesses = [];
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
        'is_register' => 0,
        'registeredBusinesses' => [],
        'house_owner_name' => null,
        'house_owner_phone' => null,
        'house_owner_address' => null,
        'house_owner_monthly_rent' => null,
        'rent_agreement' => null,
        //third step
        'length' => null,
        'width' => null,
        'application_date' => null,
        'application_date_en' => null,
        'land_ownership_certificate' => null,
        'ward_recommendation' => null,
        'embassy_document' => null,
        'registration_document' => null,
        'license' => null,
        'tax_document' => null,

        //second step
        'partners' => [],
        'other_document' => []

    ];


    public function mount()
    {
        $this->partnerArrayIncrement();
        $officeSetting = OfficeSetting::first();
        $this->provinces = get_provinces();
        $this->form['province_id'] = $officeSetting->province_id;
        $this->form['district_id'] = $officeSetting->district_id;
        $this->form['local_body_id'] = $officeSetting->local_body_id;
        $this->businessNatures = BusinessNature::all();
        $this->objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();
    }

    protected array $firstStepValidations = [
        'form.name' => ['required'],
        'form.name_en' => ['required'],
        'form.address' => ['required'],
        'form.address_en' => ['required'],
        'form.business_nature_id' => ['required', 'exists:business_natures,id'],
        'form.object_transaction_id' => ['nullable', 'exists:object_transactions,id'],
        'form.working_capital' => ['nullable'],
        'form.fixed_capital' => ['nullable'],
        'form.investment' => ['required'],
        'form.purpose' => ['required'],
        'form.province_id' => ['required', 'exists:provinces,id'],
        'form.district_id' => ['required', 'exists:districts,id'],
        'form.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.ward_no' => ['required', 'integer'],
        'form.way' => ['nullable', 'string'],
        'form.tole' => ['required', 'string'],
        'form.is_rent' => ['required', 'boolean'],
        'form.house_owner_name' => ['required_if:form.is_rent,1'],
        'form.house_owner_phone' => ['nullable'],
        'form.house_owner_address' => ['nullable'],
        'form.house_owner_monthly_rent' => ['required_if:form.is_rent,1'],
        'form.rent_agreement' => ['nullable'],
        'form.is_register' => ['nullable'],
        'form.registeredBusinesses' => ['required_if:form.is_register,1', 'array'],
        'form.registeredBusinesses.*.business_name' => ['required_if:form.is_register,1'],
        'form.registeredBusinesses.*.registration_no' => ['nullable'],
        'form.registeredBusinesses.*.registration_date' => ['nullable'],
        'form.registeredBusinesses.*.is_active' => ['nullable'],
    ];

    protected array $secondStepValidations = [
        'form.partners' => ['required', 'array'],
        'form.partners.*.name' => ['required'],
        'form.partners.*.name_en' => ['required'],
        'form.partners.*.citizenship_no' => ['required'],
        'form.partners.*.issue_date' => ['required'],
        'form.partners.*.phone' => ['required'],
        'form.partners.*.email' => ['nullable'],
        'form.partners.*.house_no' => ['nullable'],
        'form.partners.*.account_no' => ['nullable'],
        'form.partners.*.national_card_no' => ['nullable'],
        'form.partners.*.gender' => ['required'],
        'form.partners.*.education_qualification' => ['required'],
        'form.partners.*.occupation' => ['required'],
        'form.partners.*.father_name' => ['required'],
        'form.partners.*.grandfather_name' => ['required'],
        'form.partners.*.photo' => ['nullable'],
        'form.partners.*.signature' => ['nullable'],
        'form.partners.*.citizenship_front' => ['nullable'],
        'form.partners.*.citizenship_back' => ['nullable'],
        'form.partners.*.position' => ['required','integer'],
        'form.partners.*.province_id' => ['required', 'exists:provinces,id'],
        'form.partners.*.district_id' => ['required', 'exists:districts,id'],
        'form.partners.*.issue_district_id' => ['required', 'exists:districts,id'],
        'form.partners.*.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.partners.*.ward_no' => ['required', 'integer'],
        'form.partners.*.way' => ['nullable', 'string'],
        'form.partners.*.tole' => ['required', 'string'],
    ];

    protected array $thirdStepValidations = [

        'form.length' => ['required'],
        'form.width' => ['nullable'],
        'form.application_date' => ['required'],
        'form.application_date_en' => ['required'],
        'form.land_ownership_certificate' => ['nullable'],
        'form.ward_recommendation' => ['required'],
        'form.embassy_document' => ['nullable'],
        'form.registration_document' => ['nullable'],
        'form.license' => ['nullable'],
        'form.tax_document' => ['nullable'],
        'form.other_document' => ['nullable', 'array'],


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
        $this->calculateProgressPercentage();
    }

    public function backStep($step): void
    {
        $this->currentStep = $step;
        $this->calculateProgressPercentage();
    }

    public function submitForm()
    {
        $this->validate();
        $businessDetail = DB::transaction(function () {
            $businessDetail = BusinessDetail::create(\Arr::except($this->form,['working_capital','fixed_capital']) + [
                    'submission_no' => time(),
                    'working_capital'=> is_null($this->form['working_capital']) ?   0 : $this->form['working_capital'],
                    'fixed_capital'=> is_null($this->form['fixed_capital']) ?   0 : $this->form['fixed_capital']
                ]);
            foreach ($this->form['partners'] as $partner) {
                $businessDetail->partners()->create($partner);
            }
            foreach ($this->form['registeredBusinesses'] as $registeredBusiness) {
                $businessDetail->registeredBusinesses()->create($registeredBusiness);
            }
            foreach ($this->form['other_document'] as $document) {
                $businessDetail->files()->create([
                    'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $document->getClientOriginalExtension(),
                    'file' => $document->store('otherDocument/', 'public')
                ]);
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
        if (!empty($this->form['province_id'])) {
            $this->districts = get_districts($this->form['province_id']);
        }
        if (!empty($this->form['district_id'])) {
            $this->localBodies = get_local_bodies($this->form['district_id']);
        }
        if (!empty($this->form['local_body_id'])) {
            $this->wards = get_local_bodies(localBodyId: $this->form['local_body_id'])->ward_no;
        }

        if ($this->form['is_rent'] == '0') {
            $this->form['house_owner_name'] = null;
            $this->form['house_owner_phone'] = null;
            $this->form['house_owner_address'] = null;
            $this->form['house_owner_monthly_rent'] = null;
        }

        if ($this->form['is_register'] == '0') {
            $this->form['registeredBusinesses'] = [];
        }

        return view('businessregistration::livewire.registration-form');
    }

    private function calculateProgressPercentage()
    {
        $this->reset('progressPercentage');
        $this->progressPercentage = $this->currentStep / 3 * 100;
    }
    public function messages(): array
    {
        return [
            'form.name.required' => ['नाम आवश्यक छ'],
            'form.name_en.required' => ['नाम अंग्रेजीमा आवश्यक छ'],
            'form.address.required' => ['ठेगाना आबश्यक छ '],
            'form.address_en.required' => ['ठेगाना अंग्रेजीमा आबश्यक छ '],
            'form.business_nature_id.required' => ['व्यवसायको प्रकृति आबश्यक छ'],
            'form.object_transaction_id.required' => ['व्यवसायको कारोबार गर्ने बस्तु आबश्यक छ '],
            'form.working_capital.required' => ['चालु पूँजी आबश्यक छ '],
            'form.fixed_capital.required' => ['स्थिर पूँजी आबश्यक छ '],
            'form.investment.required' => ['पूँजीगत लगानी आबश्यक छ '],
            'form.purpose.required' => ['उधेश्य आबश्यक छ '],
            'form.province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.local_body_id.required' => ['स्थानीय निकाय  आबश्यक छ '],
            'form.ward_no.required' => ['वार्ड न. आबस्यक छ'],
            'form.way.required' => ['मार्ग आबश्यक छ '],
            'form.tole.required' => ['टोल आबश्यक छ '],
            'form.house_owner_name.required_if' => ['नाम आवश्यक छ'],
            'form.house_owner_phone.required_if' => ['फोन आवश्यक छ'],
            'form.house_owner_address.required_if' => ['ठेगाना आबश्यक छ'],
            'form.house_owner_monthly_rent.required_if' => ['भाडा आबश्यक छ'],
            'form.rent_agreement.required_if' => ['भाडा सम्झौता आबश्यक छ'],
            'form.registeredBusinesses.required_if' => ['व्यवसाय दर्ता आबश्यक छ'],
            'form.registeredBusinesses.*.business_name.required_if' => ['व्यवसाय नाम आबश्यक छ'],
            'form.registeredBusinesses.*.registration_no.required_if' => ['दर्ता नम्बर आबश्यक छ'],
            'form.registeredBusinesses.*.registration_date.required_if' => ['दर्ता मिति आबश्यक छ'],
            'form.registeredBusinesses.*.is_active.required_if' => ['सक्रिय आबश्यक छ'],
            'form.partners.required' => ['पार्टनर आबश्यक छ'],
            'form.partners.*.name.required' => ['नाम आबश्यक छ'],
            'form.partners.*.name_en.required' => ['नाम अंग्रेजीमा आबश्यक छ'],
            'form.partners.*.citizenship_no.required' => ['नागरिकता नं आबश्यक छ'],
            'form.partners.*.issue_date.required' => ['जारि मिति आबश्यक छ'],
            'form.partners.*.phone.required' => ['फोन आबश्यक छ'],
            'form.partners.*.email.required' => ['इमेल आबश्यक छ'],
            'form.partners.*.house_no.required' => ['घर नं आबश्यक छ'],
            'form.partners.*.account_no.required' => ['व्यक्तिगत स्थाई लेखा नं आबश्यक छ'],
            'form.partners.*.national_card_no.required' => ['राष्ट्रियता परिचयपत्र नं आबश्यक छ'],
            'form.partners.*.gender.required' => ['लिङ्ग आबश्यक छ'],
            'form.partners.*.education_qualification.required' => ['शैक्षिक योग्यता आबश्यक छ'],
            'form.partners.*.occupation.required' => ['पेशा आबश्यक छ'],
            'form.partners.*.father_name.required' => ['बुवाको नाम आबश्यक छ'],
            'form.partners.*.grandfather_name.required' => ['बजेको नाम आबश्यक छ'],
            'form.partners.*.photo.required' => ['फोटो आबश्यक छ'],
            'form.partners.*.signature.required' => ['हस्ताक्षर आबश्यक छ'],
            'form.partners.*.citizenship_front.required' => ['नागरिकता (अगाडि) आबश्यक छ'],
            'form.partners.*.citizenship_back.required' => ['नागरिकता (पछाडी) आबश्यक छ'],
            'form.partners.*.position.required' => ['मर्यादाक्रम आबश्यक छ'],
            'form.partners.*.province_id.required' => ['प्रदेश आबश्यक छ'],
            'form.partners.*.district_id.required' => ['जिल्ला आबश्यक छ'],
            'form.partners.*.issue_district_id.required' => ['नागरिकता जारी जिल्ला आबश्यक छ'],
            'form.partners.*.local_body_id.required' => ['पालिका आबश्यक छ'],
            'form.partners.*.ward_no.required' => ['वार्ड नं आबश्यक छ'],
            'form.partners.*.way.required' => ['मार्ग आबश्यक छ'],
            'form.partners.*.tole.required' => ['टोल आबश्यक छ'],
            'form.length.required' => ['लम्बाई आबश्यक छ'],
            'form.width.required' => ['चौडाई आबश्यक छ'],
            'form.application_date.required' => ['आवेदन मिति बि सं आबश्यक छ'],
            'form.application_date_en.required' => ['आवेदन मिति सं आबश्यक छ'],
            'form.land_ownership_certificate.required' => ['जग्गा धनि प्रमाणपत्र आबश्यक छ'],
            'form.ward_recommendation.required' => [' वार्ड सिफारिस आबश्यक छ'],
            'form.embassy_document.required' => [' राजदूतावासको कागजात आबश्यक छ'],
            'form.registration_document.required' => [' दर्ता प्रमाणपत्र आबश्यक छ'],
            'form.license.required' => [' इजाजत पत्र आबश्यक छ'],
            'form.tax_document.required' => [' कर तिरेको प्रमाणपत्र आबश्यक छ'],
            'form.other_document' => ['अन्य कागजात आबश्यक छ'],

        ];
    }
}
