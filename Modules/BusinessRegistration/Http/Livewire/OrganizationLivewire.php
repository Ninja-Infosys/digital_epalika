<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\BusinessRegistration\Entities\CommitteeName;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Entities\Partner;
use Modules\BusinessRegistration\Entities\RegisteredBusiness;
use function officeSetting;

class OrganizationLivewire extends Component
{
    use WithFileUploads;

    public int $currentStep = 1;
    public float $progressPercentage = 0;

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = [];
    public $committeeNames = [];
    public OrganizationRegistration $organizationRegistration;

    public array $form = [
        'name' => null,
        'name_en' => null,
        'address' => null,
        'address_en' => null,
        'financial_source' => null,
        'purpose' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'way' => null,
        'tole' => null,
        //third step
        'application_date' => null,
        'application_date_en' => null,
        'ward_recommendation' => null,
        'statute' => null,
        //second step
        'committeeNames' => [],
        'other_document' => []

    ];


    public function mount($organizationRegistration = null)
    {
        $this->provinces = get_provinces();
        if (!empty($organizationRegistration)) {
            $this->organizationRegistration = $organizationRegistration;
            $this->assignOrganizationRegistrationData();
        } else {
            $this->committeeNameArrayIncrement();
            $this->form['province_id'] = officeSetting()->province_id;
            $this->form['district_id'] = officeSetting()->district_id;
            $this->form['local_body_id'] = officeSetting()->local_body_id;
        }
    }

    private function assignOrganizationRegistrationData()
    {
        foreach (\Arr::except($this->form, ['photo', 'committeeNames','files', 'ward_recommendation','statute']) as $key => $data) {
            $this->form[$key] = $this->organizationRegistration[$key];
        }

        foreach ($this->organizationRegistration->committeeNames as $committeeName) {
            $this->form['committeeNames'][] = [
                'id' => $committeeName->id ?? null,
                'name' => $committeeName->name ?? null,
                'name_en' => $committeeName->name_en ?? null,
                'citizenship_no' => $committeeName->citizenship_no ?? null,
                'issue_date' => $committeeName->issue_date ?? null,
                'phone' => $committeeName->phone ?? null,
                'email' => $committeeName->email ?? null,
                'designation' => $committeeName->designation ?? null,
                'national_card_no' => $committeeName->national_card_no ?? null,
                'gender' => $committeeName->gender?->value ?? null,
                'father_name' => $committeeName->father_name ?? null,
                'grandfather_name' => $committeeName->grandfather_name ?? null,
                'position' => $committeeName->position ?? null,
                'province_id' => $committeeName->province_id ?? null,
                'district_id' => $committeeName->district_id ?? null,
                'issue_district_id' => $committeeName->issue_district_id ?? null,
                'local_body_id' => $committeeName->local_body_id ?? null,
                'ward_no' => $committeeName->ward_no ?? null,
                'way' => $committeeName->way ?? null,
                'tole' => $committeeName->tole ?? null,
            ];
        }
    }




    protected array $secondStepValidations = [
        'form.committeeNames' => ['required', 'array'],
        'form.committeeNames.*.name' => ['required'],
        'form.committeeNames.*.name_en' => ['required'],
        'form.committeeNames.*.citizenship_no' => ['required'],
        'form.committeeNames.*.issue_date' => ['required'],
        'form.committeeNames.*.phone' => ['required'],
        'form.committeeNames.*.email' => ['nullable'],
        'form.committeeNames.*.designation' => ['nullable'],
        'form.committeeNames.*.national_card_no' => ['nullable'],
        'form.committeeNames.*.gender' => ['required'],
        'form.committeeNames.*.father_name' => ['required'],
        'form.committeeNames.*.grandfather_name' => ['required'],
        'form.committeeNames.*.position' => ['required', 'integer'],
        'form.committeeNames.*.province_id' => ['required', 'exists:provinces,id'],
        'form.committeeNames.*.district_id' => ['required', 'exists:districts,id'],
        'form.committeeNames.*.issue_district_id' => ['required', 'exists:districts,id'],
        'form.committeeNames.*.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.committeeNames.*.ward_no' => ['required', 'integer'],
        'form.committeeNames.*.way' => ['nullable', 'string'],
        'form.committeeNames.*.tole' => ['required', 'string'],
    ];

    protected function firstStepValidation(): array
    {
        return [
            'form.name' => ['required'],
            'form.name_en' => ['required'],
            'form.address' => ['required'],
            'form.address_en' => ['required'],
            'form.financial_source' => ['nullable'],
            'form.purpose' => ['required'],
            'form.province_id' => ['required', 'exists:provinces,id'],
            'form.district_id' => ['required', 'exists:districts,id'],
            'form.local_body_id' => ['required', 'exists:local_bodies,id'],
            'form.ward_no' => ['required', 'integer'],
            'form.way' => ['nullable', 'string'],
            'form.tole' => ['required', 'string'],
        ];
    }

    protected function secondStepValidations(): array
    {
        return !empty($this->organizationRegistration)
            ? array_merge($this->secondStepValidations, [
                'form.committeeNames.*.photo' => ['required'],
                'form.committeeNames.*.citizenship_front' => ['required'],
                'form.committeeNames.*.citizenship_back' => ['required'],
            ])
            : array_merge($this->secondStepValidations, [
                'form.committeeNames.*.photo' => ['nullable'],
                'form.committeeNames.*.citizenship_front' => ['nullable'],
                'form.committeeNames.*.citizenship_back' => ['nullable'],
            ]);
    }

    protected array $thirdStepValidations = [
        'form.application_date' => ['required'],
        'form.application_date_en' => ['required'],
        'form.other_document' => ['nullable', 'array'],


    ];

    protected function thirdStepValidations(): array
    {
        return !empty($this->organizationRegistration)
            ? array_merge($this->thirdStepValidations, [
                'form.ward_recommendation' => ['nullable'],
                'form.statute' => ['nullable'],
            ])
            : array_merge($this->thirdStepValidations, [
                'form.ward_recommendation' => ['required'],
                'form.statute' => ['nullable'],
            ]);
    }

    public function rules(): array
    {
        return match ($this->currentStep) {
            2 => $this->secondStepValidations(),
            3 => $this->thirdStepValidations(),
            default => $this->firstStepValidation(),
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

        if (!empty($this->organizationRegistration)) {
            DB::transaction(function () {
                $this->organizationRegistration->update($this->form);
                $this->saveOrganizationRegistrationsData($this->organizationRegistration);
            });
            $this->dispatchBrowserEvent('alert_message', [
                'type' => 'success',
                'title' => 'तपाइको संस्था सफलता पुर्बक अध्याबधिक भयो'
            ]);
            return redirect(route('admin.businessRegistration.organizationRegistration.index'));
        }

        $organizationRegistration = DB::transaction(function () {
            $organizationRegistration = OrganizationRegistration::create($this->form + [
                    'submission_no' => time(),
                ]);
            $this->saveOrganizationRegistrationsData($organizationRegistration);
            return $organizationRegistration;
        });
        $this->dispatchBrowserEvent('alert_message', [
            'type' => 'success',
            'title' => 'धन्यबाद',
            'text' => 'तपाइको व्यवसाय सफलता पुर्बक दर्ता भयो',
        ]);
        $this->reset('form');
        return redirect()->route('businessRegistration.print', $organizationRegistration->id);
    }

    private function saveOrganizationRegistrationsData($organizationRegistration): void
    {
        foreach ($this->form['committeeNames'] as $committeeName) {
            CommitteeName::updateOrCreate(
                ['organization_registration_id' => $organizationRegistration->id, 'id' => $committeeName['id'] ?? null],
                $committeeName
            );
        }
        foreach ($this->form['other_document'] ?? [] as $document) {
            $organizationRegistration->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('otherDocument/', 'public')
            ]);
        }
    }

    public function committeeNameArrayIncrement(): void
    {
        $this->form['committeeNames'][] = [
            'province_id' => officeSetting()->province_id,
            'district_id' => officeSetting()->district_id,
            'local_body_id' => officeSetting()->local_body_id,
        ];
    }

    public function committeeNameArrayDecrement($index): void
    {
        if (!empty($this->form['committeeNames'][$index]['id'])) {
            Partner::find($this->form['committeeNames'][$index]['id'])->delete();
        }
        unset($this->form['committeeNames'][$index]);
        $this->form['committeeNames'] = array_values($this->form['committeeNames']);
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

        return view('businessregistration::livewire.organization-livewire');
    }

    private function calculateProgressPercentage(): void
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
            'form.financial_source.required' => ['आर्थिक स्रोत आबश्यक छ '],
            'form.purpose.required' => ['उधेश्य आबश्यक छ '],
            'form.province_id.required' => ['प्रदेश आबश्यक छ '],
            'form.district_id.required' => ['जिल्ला आबश्यक छ '],
            'form.local_body_id.required' => ['स्थानीय निकाय  आबश्यक छ '],
            'form.ward_no.required' => ['वार्ड न. आबस्यक छ'],
            'form.way.required' => ['मार्ग आबश्यक छ '],
            'form.tole.required' => ['टोल आबश्यक छ '],
            'form.rent_agreement.required_if' => ['भाडा सम्झौता आबश्यक छ'],
            'form.committeeNames.required' => ['पार्टनर आबश्यक छ'],
            'form.committeeNames.*.name.required' => ['नाम आबश्यक छ'],
            'form.committeeNames.*.name_en.required' => ['नाम अंग्रेजीमा आबश्यक छ'],
            'form.committeeNames.*.citizenship_no.required' => ['नागरिकता नं आबश्यक छ'],
            'form.committeeNames.*.issue_date.required' => ['जारि मिति आबश्यक छ'],
            'form.committeeNames.*.phone.required' => ['फोन आबश्यक छ'],
            'form.committeeNames.*.email.required' => ['इमेल आबश्यक छ'],
            'form.committeeNames.*.designation.required' => ['पद आबश्यक छ'],
            'form.committeeNames.*.national_card_no.required' => ['राष्ट्रियता परिचयपत्र नं आबश्यक छ'],
            'form.committeeNames.*.gender.required' => ['लिङ्ग आबश्यक छ'],
            'form.committeeNames.*.occupation.required' => ['पेशा आबश्यक छ'],
            'form.committeeNames.*.father_name.required' => ['बुवाको नाम आबश्यक छ'],
            'form.committeeNames.*.grandfather_name.required' => ['बजेको नाम आबश्यक छ'],
            'form.committeeNames.*.photo.required' => ['फोटो आबश्यक छ'],
            'form.committeeNames.*.citizenship_front.required' => ['नागरिकता (अगाडि) आबश्यक छ'],
            'form.committeeNames.*.citizenship_back.required' => ['नागरिकता (पछाडी) आबश्यक छ'],
            'form.committeeNames.*.position.required' => ['मर्यादाक्रम आबश्यक छ'],
            'form.committeeNames.*.province_id.required' => ['प्रदेश आबश्यक छ'],
            'form.committeeNames.*.district_id.required' => ['जिल्ला आबश्यक छ'],
            'form.committeeNames.*.issue_district_id.required' => ['नागरिकता जारी जिल्ला आबश्यक छ'],
            'form.committeeNames.*.local_body_id.required' => ['पालिका आबश्यक छ'],
            'form.committeeNames.*.ward_no.required' => ['वार्ड नं आबश्यक छ'],
            'form.committeeNames.*.way.required' => ['मार्ग आबश्यक छ'],
            'form.committeeNames.*.tole.required' => ['टोल आबश्यक छ'],
            'form.application_date.required' => ['आवेदन मिति बि सं आबश्यक छ'],
            'form.application_date_en.required' => ['आवेदन मिति सं आबश्यक छ'],
            'form.ward_recommendation.required' => [' वार्ड सिफारिस आबश्यक छ'],
            'form.statute.required' => ['संस्थाको प्रमाणित विधान आवश्यक छ'],
            'form.other_document' => ['अन्य कागजात आबश्यक छ'],

        ];
    }
}
