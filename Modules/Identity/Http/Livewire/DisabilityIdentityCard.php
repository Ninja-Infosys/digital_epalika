<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Ethnicity;
use App\Models\Occupation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\Relationship;

class DisabilityIdentityCard extends Component
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

    public array $form = [
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

    public function mount(): void
    {
        $this->provinces = Province::all();
        $this->ethnicities = Ethnicity::all();
        $this->relations = Relationship::all();
        $this->disabilityTypes = DisabilityType::all();
        $this->disabilityReasons = DisabilityReason::all();
        $this->occupations = Occupation::all();
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
        'form.photo' => ['required'],
        'form.name' => ['required'],
        'form.name_en' => ['required'],
        'form.gender' => ['required'],
        'form.ethnicity_id' => ['required'],
        'form.dob_bs' => ['required'],
        'form.dob_ad' => ['required'],
    ];
    protected array $secondStepValidations = [
        'form.permanent_province_id' => ['required'],
        'form.permanent_district_id' => ['required'],
        'form.permanent_local_body_id' => ['required'],
        'form.permanent_ward' => ['required'],
        'form.permanent_tole' => ['required'],
        'form.temporary_province_id' => ['required'],
        'form.temporary_district_id' => ['required'],
        'form.temporary_local_body_id' => ['required'],
        'form.temporary_ward' => ['required'],
        'form.temporary_tole' => ['required'],
    ];
    protected array $thirdStepValidations = [
        'form.guardian_name' => ['required'],
        'form.guardian_name_en' => ['required'],
        'form.relationship_id' => ['required'],
        'form.phone' => ['required'],
    ];
    protected array $fourthStepValidations = [
        'form.disability_type_id' => ['required'],
        'form.blood_group' => ['required'],
        'form.disability_reason_id' => ['required'],
    ];
    protected array $fifthStepValidations = [
        'form.receiving_body' => ['required'],
        'form.card_no' => ['required'],
        'form.date_bs' => ['required'],
        'form.date_ad' => ['required'],
        'form.father_name' => ['required'],
        'form.father_name_en' => ['required'],
        'form.grand_father_name' => ['required'],
        'form.grand_father_name_en' => ['required'],
        'form.mother_name' => ['required'],
        'form.mother_name_en' => ['required'],
    ];
    protected array $sixthStepValidations = [
        'form.birth_registration_no' => ['required'],
        'form.birth_registration_place' => ['required'],
        'form.birth_registration_bs' => ['required'],
        'form.birth_registration_ad' => ['required'],
        'form.citizenship_no' => ['required'],
        'form.citizenship_no_place' => ['required'],
        'form.citizenship_no_bs' => ['required'],
        'form.citizenship_no_ad' => ['required'],
        'form.citizenship_photo' => ['required'],
        'form.citizenship_photo_certificate' => ['required'],
    ];
    protected array $seventhStepValidations = [
        'form.material_description' => ['required'],
        'form.qualification' => ['required'],
        'form.daily_activity' => ['required'],
        'form.supporting_material' => ['required'],
    ];
    protected array $eighthStepValidations = [
        'form.helping_task.*' => ['required'],
        'form.without_helping_task.*' => ['required'],
    ];
    protected array $ninthStepValidations = [
        'form.main_training_name' => ['required'],
        'form.occupation_id' => ['nullable'],
    ];
    protected array $tenthStepValidations = [
        'form.provide_detail_full_name' => ['required'],
        'form.provide_detail_address' => ['required'],
        'form.provide_detail_phone_no' => ['required'],
        'form.provide_detail_citizenship_no' => ['required'],
        'form.provide_detail_citizenship_no_date' => ['required'],
        'form.provide_detail_citizenship_no_place' => ['required'],
    ];

    public function rules(): array
    {
//        dd($this->secondStepValidations);
        return match ($this->currentStep) {
            1 => $this->firstStepValidations,
            2 => $this->secondStepValidations,
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            5 => $this->fifthStepValidations,
            6 => $this->sixthStepValidations,
            7 => $this->seventhStepValidations,
            8 => $this->eighthStepValidations,
            9 => $this->ninthStepValidations,
            10 => $this->tenthStepValidations,
            default => array_merge($this->firstStepValidations,
                $this->secondStepValidations,
                $this->thirdStepValidations,
                $this->fourthStepValidations,
                $this->fifthStepValidations,
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

    public function saveForm()
    {

        $this->validate();

//        dd($this->form);
        \Modules\Identity\Entities\DisabilityIdentityCard::create($this->form);
        dd('done');

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
        return view('identity::livewire.disability-identity-card');
    }
}
