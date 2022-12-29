<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Ethnicity;
use App\Models\Occupation;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\Relationship;

class DisabilityIdentityCardLivewire extends Component
{

    use WithFileUploads;

    public int $currentStep = 1;


    public $relations = [];

    public $occupations = [];
    public $disabilityTypes = [];
    public $disabilityReasons = [];
    public $ethnicities = [];
    public $provinces = [];
    public $permanent_districts = [];
    public $permanent_localBodies = [];
    public $permanent_wards = [];
    public $temporary_districts = [];
    public $temporary_localBodies = [];
    public $temporary_wards = [];

    public DisabilityIdentityCard $disabilityIdentityCard;

    public array $form = [
        'material_name' => null,
        'is_necessary' => null,
        'identity_type' => null,
        'finger_print_type' => null,
        'finger_left' => null,
        'finger_right' => null,
        'photo' => null,
        'name' => null,
        'name_en' => null,
        'gender' => null,
        'ethnicity_id' => null,
        'dob_bs' => null,
        'dob_ad' => null,
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
        'guardian_name' => null,
        'guardian_name_en' => null,
        'relationship_id' => null,
        'phone' => null,
        'disability_type_id' => null,
        'blood_group' => null,
        'disability_reason_id' => null,
        'receiving_body' => null,
        'card_no' => null,
        'date_bs' => null,
        'date_ad' => null,
        'father_name' => null,
        'father_name_en' => null,
        'grand_father_name' => null,
        'grand_father_name_en' => null,
        'mother_name' => null,
        'mother_name_en' => null,
        'birth_registration_no' => null,
        'birth_registration_place' => null,
        'birth_registration_bs' => null,
        'birth_registration_ad' => null,
        'citizenship_no' => null,
        'citizenship_no_place' => null,
        'citizenship_no_bs' => null,
        'citizenship_no_ad' => null,
        'citizenship_photo' => null,
        'citizenship_photo_certificate' => null,
        'material_description' => null,
        'qualification' => null,
        'daily_activity' => null,
        'supporting_material' => null,
        'helping_task' => [],
        'without_helping_task' => [],
        'main_training_name' => null,
        'occupation_id' => null,
        'provide_detail_full_name' => null,
        'provide_detail_address' => null,
        'provide_detail_phone_no' => null,
        'provide_detail_citizenship_no' => null,
        'provide_detail_citizenship_no_date' => null,
        'provide_detail_citizenship_no_place' => null,
    ];


    protected $listeners = ['dobChanged','dateChanged','birthRegistrationChanged','citizenshipNoChanged'];

    public function dobChanged($nepaliDate, $englishDate): void
    {
        $this->form['dob_bs'] = $nepaliDate;
        $this->form['dob_ad'] = $englishDate;
    }
    public function dateChanged($nepaliDate, $englishDate): void
    {
        $this->form['date_bs'] = $nepaliDate;
        $this->form['date_ad'] = $englishDate;
    }
    public function birthRegistrationChanged($nepaliDate, $englishDate): void
    {
        $this->form['birth_registration_bs'] = $nepaliDate;
        $this->form['birth_registration_ad'] = $englishDate;
    }
    public function citizenshipNoChanged($nepaliDate, $englishDate): void
    {
        $this->form['citizenship_no_bs'] = $nepaliDate;
        $this->form['citizenship_no_ad'] = $englishDate;
    }
    public function mount($disabilityIdentityCard = null): void
    {
        $officeSetting = OfficeSetting::first();
        $this->provinces = Province::all();
        $this->ethnicities = Ethnicity::all();
        $this->relations = Relationship::all();
        $this->disabilityTypes = DisabilityType::all();
        $this->disabilityReasons = DisabilityReason::all();
        $this->occupations = Occupation::all();


        if (!empty($disabilityIdentityCard)) {
            $this->disabilityIdentityCard = $disabilityIdentityCard;
            foreach ($this->form as $key => $data) {
                if (!in_array($key, ['finger_left', 'finger_right', 'photo', 'citizenship_photo', 'citizenship_photo_certificate'])) {
                    $this->form[$key] = $disabilityIdentityCard[$key];
                }
            }
        } else {
            $this->form['permanent_province_id'] = $officeSetting->province_id;
            $this->form['permanent_district_id'] = $officeSetting->district_id;
            $this->form['permanent_local_body_id'] = $officeSetting->local_body_id;
            $this->form['temporary_province_id'] = $officeSetting->province_id;
            $this->form['temporary_district_id'] = $officeSetting->district_id;
            $this->form['temporary_local_body_id'] = $officeSetting->local_body_id;
        }
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

    protected array $identityDetailValidations = [
        'form.finger_print_type' => ['required'],
        'form.name' => ['required', 'string', 'max:255'],
        'form.name_en' => ['required', 'string', 'max:255'],
        'form.gender' => ['required'],
        'form.ethnicity_id' => ['required', 'exists:ethnicities,id'],
        'form.dob_bs' => ['required'],
        'form.dob_ad' => ['required'],
        'form.permanent_province_id' => ['required', 'exists:provinces,id'],
        'form.permanent_district_id' => ['required', 'exists:districts,id'],
        'form.permanent_local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.permanent_ward' => ['required', 'integer'],
        'form.permanent_tole' => ['required', 'string'],
        'form.temporary_province_id' => ['required', 'exists:provinces,id'],
        'form.temporary_district_id' => ['required', 'exists:districts,id'],
        'form.temporary_local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.temporary_ward' => ['required', 'integer'],
        'form.temporary_tole' => ['required', 'string'],
    ];

    protected function firstStepValidations(): array
    {
        return !empty($this->disabilityIdentityCard)
            ? array_merge($this->identityDetailValidations, [
                'form.finger_left' => ['nullable', 'image'],
                'form.finger_right' => ['nullable', 'image'],
                'form.photo' => ['nullable', 'image'],
            ])
            : array_merge($this->identityDetailValidations, [
                'form.finger_left' => ['required_if:form.finger_print_type,==,legs,finger'],
                'form.finger_right' => ['required_if:form.finger_print_type,==,legs,finger'],
                'form.photo' => ['required', 'image'],
            ]);
    }

    protected array $secondStepValidations = [
        'form.guardian_name' => ['required', 'string', 'max:255'],
        'form.guardian_name_en' => ['required', 'string', 'max:255'],
        'form.relationship_id' => ['required', 'exists:relationships,id'],
        'form.phone' => ['required'],
    ];
    protected array $thirdStepValidations = [
        'form.disability_type_id' => ['required', 'exists:disability_types,id'],
        'form.blood_group' => ['required'],
        'form.disability_reason_id' => ['required', 'exists:disability_reasons,id'],
    ];
    protected array $fourthStepValidations = [
        'form.identity_type' => ['required'],
        'form.receiving_body' => ['required_if:form.identity_type,==,receive'],
        'form.card_no' => ['required_if:form.identity_type,==,receive'],
        'form.date_bs' => ['required_if:form.identity_type,==,receive'],
        'form.date_ad' => ['required_if:form.identity_type,==,receive'],
        'form.father_name' => ['required', 'string', 'max:255'],
        'form.father_name_en' => ['required', 'string', 'max:255'],
        'form.grand_father_name' => ['required', 'string', 'max:255'],
        'form.grand_father_name_en' => ['required', 'string', 'max:255'],
        'form.mother_name' => ['required', 'string', 'max:255'],
        'form.mother_name_en' => ['required', 'string', 'max:255'],
    ];

    protected array $disclosureStatementRules = [
        'form.birth_registration_no' => ['required'],
        'form.birth_registration_place' => ['required'],
        'form.birth_registration_bs' => ['required'],
        'form.birth_registration_ad' => ['required'],
        'form.citizenship_no' => ['required'],
        'form.citizenship_no_place' => ['required'],
        'form.citizenship_no_bs' => ['required'],
        'form.citizenship_no_ad' => ['required']
    ];

    protected function fifthStepValidations(): array
    {
        return !empty($this->disabilityIdentityCard)
            ? array_merge($this->disclosureStatementRules, [
                'form.citizenship_photo' => ['nullable', 'image'],
                'form.citizenship_photo_certificate' => ['nullable', 'image']
            ])
            : array_merge($this->disclosureStatementRules, [
                'form.citizenship_photo' => ['required', 'image'],
                'form.citizenship_photo_certificate' => ['required', 'image']
            ]);
    }

    protected array $sixthStepValidations = [
        'form.is_necessary' => ['required', 'boolean'],
        'form.material_description' => ['required_if:form.is_necessary,==,1'],
        'form.qualification' => ['required'],
        'form.daily_activity' => ['required'],
        'form.supporting_material' => ['required'],
        'form.material_name' => ['required', 'string', 'max:255'],
    ];
    protected array $seventhStepValidations = [
        'form.helping_task' => ['required', 'array'],
        'form.helping_task.*' => ['required'],
        'form.without_helping_task' => ['required', 'array'],
        'form.without_helping_task.*' => ['required'],
    ];
    protected array $eighthStepValidations = [
        'form.main_training_name' => ['required', 'string'],
        'form.occupation_id' => ['nullable', 'exists:occupations,id'],
    ];
    protected array $ninthStepValidations = [
        'form.provide_detail_full_name' => ['required', 'string', 'max:255'],
        'form.provide_detail_address' => ['required', 'string', 'max:255'],
        'form.provide_detail_phone_no' => ['required'],
        'form.provide_detail_citizenship_no' => ['required'],
        'form.provide_detail_citizenship_no_date' => ['required'],
        'form.provide_detail_citizenship_no_place' => ['required', 'string', 'max:255'],
    ];


    public function rules(): array
    {

        return match ($this->currentStep) {
            1 => $this->firstStepValidations(),
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            5 => $this->fifthStepValidations(),
            6 => $this->sixthStepValidations,
            7 => $this->seventhStepValidations,
            8 => $this->eighthStepValidations,
            9 => $this->ninthStepValidations,

            default => array_merge($this->firstStepValidations(),
                $this->secondStepValidations,
                $this->thirdStepValidations,
                $this->fourthStepValidations,
                $this->fifthStepValidations(),
                $this->sixthStepValidations,
                $this->seventhStepValidations,
                $this->eighthStepValidations,
                $this->ninthStepValidations,

            ),
        };
    }


    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function saveForm(): RedirectResponse|Application|Redirector
    {
        $this->validate();

        if (!empty($this->disabilityIdentityCard)) {
            $this->disabilityIdentityCard->update($this->form);
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'success',
                'title' => 'अपाङ्गता परिचय पत्र सफलतापुर्बक अध्याबधिक भयो'
            ]);
            return redirect(route('identity.admin.disabilityIdentityCard.index'));
        }

        DisabilityIdentityCard::create($this->form);
        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'तपाइको अपाङ्गता परिचय पत्र दर्ता भयो'
        ]);
        $this->reset('form');
        return back();

    }

    public function helpingTaskIncrement(): void
    {
        $this->form['helping_task'][] = [];
    }

    public function helpingTaskDecrement($index): void
    {
        unset($this->form['helping_task'][$index]);
        $this->form['helping_task'] = array_values($this->form['helping_task']);
    }

    public function withoutHelpingTaskIncrement(): void
    {
        $this->form['without_helping_task'][] = [];
    }

    public function withoutHelpingTaskDecrement($index): void
    {
        unset($this->form['without_helping_task'][$index]);
        $this->form['without_helping_task'] = array_values($this->form['without_helping_task']);
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
            $this->permanent_wards = LocalBody::findOrFail($this->form['permanent_local_body_id'])->ward_no;
        }

        if (!empty($this->form['temporary_province_id'])) {
            $this->temporary_districts = Province::with('districts')->findOrFail($this->form['temporary_province_id'])->districts;
        }
        if (!empty($this->form['temporary_district_id'])) {
            $this->temporary_localBodies = District::with('localBodies')->findOrFail($this->form['temporary_district_id'])->localBodies;
        }
        if (!empty($this->form['temporary_local_body_id'])) {
            $this->temporary_wards = LocalBody::findOrFail($this->form['temporary_local_body_id'])->ward_no;
        }

        if ($this->form['is_necessary'] == 0) {
            $this->form['material_description'] = null;
        }

        if ($this->form['finger_print_type'] == 'none') {
            $this->form['finger_left'] = null;
            $this->form['finger_right'] = null;
        }

        if ($this->form['identity_type'] == 'not_receive') {
            $this->form['receiving_body'] = null;
            $this->form['card_no'] = null;
            $this->form['date_bs'] = null;
            $this->form['date_ad'] = null;
        }

        return view('identity::livewire.disability-identity-card-livewire');
    }
}
