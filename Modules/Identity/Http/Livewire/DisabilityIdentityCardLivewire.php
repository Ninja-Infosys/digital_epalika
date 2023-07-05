<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Ethnicity;
use App\Models\Occupation;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\EmployeeSignature;
use Modules\Identity\Entities\FingerPrint;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Entities\Relationship;
use Modules\Identity\Enums\ReceivingBodyEnum;

class DisabilityIdentityCardLivewire extends Component
{

    use WithFileUploads;

    use NepaliDateConverter;

    public int $currentStep = 1;

    public $relations = [];
    public $disabilityTypes = [];

    public $ethnicities = [];

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];


    public $wards = [];

    public DisabilityIdentityCard $disabilityIdentityCard;

    public array $form = [
        'name' => null,
        'name_en' => null,
        'citizenship_no' => null,
        'birth_registration_no' => null,
        'father_name' => null,
        'father_name_en' => null,
        'mother_name' => null,
        'mother_name_en' => null,
        'dob' => null,
        'dob_ad' => null,
        'gender' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'photo' => null,
        //step2
        'guardian_name' => null,
        'guardian_name_en' => null,
        'relationship_id' => null,
        'phone' => null,
        'disability_type_id' => null,
        'status' => null,

    ];

    public function mount($disabilityIdentityCard = null): void
    {
        $officeSetting = OfficeSetting::first();
        $this->provinces = get_provinces();
        $this->ethnicities = Ethnicity::all();
        $this->relations = Relationship::all();
        $this->disabilityTypes = DisabilityType::all();

        if (!empty($disabilityIdentityCard)) {
            $this->disabilityIdentityCard = $disabilityIdentityCard;
            foreach ($this->form as $key => $data) {
                if (!in_array($key, ['photo'])) {
                    $this->form[$key] = $disabilityIdentityCard[$key];
                }
            }

        } else {
            $this->form['province_id'] = $officeSetting->province_id;
            $this->form['district_id'] = $officeSetting->district_id;
            $this->form['local_body_id'] = $officeSetting->local_body_id;
        }
    }

    protected $listeners = ['dobChanged'];


    public function dobChanged($nepaliDate, $englishDate): void
    {
        $this->form['dob'] = $nepaliDate;
        $this->form['dob_ad'] = $englishDate;
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
        'form.name' => ['required', 'string', 'max:255'],
        'form.name_en' => ['required', 'string', 'max:255'],
        'form.citizenship_no' => ['nullable'],
        'form.birth_registration_no' => ['nullable'],
        'form.father_name' => ['required','string','max:255'],
        'form.father_name_en' => ['required','string','max:255'],
        'form.mother_name' => ['required', 'string','max:255'],
        'form.mother_name_en' => ['required', 'string','max:255'],
        'form.dob' => ['required'],
        'form.gender' => ['required'],
        'form.province_id' => ['required', 'exists:provinces,id'],
        'form.district_id' => ['required', 'exists:districts,id'],
        'form.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.ward_no' => ['required', 'integer'],
        'form.disability_type_id' => ['required', 'exists:disability_types,id'],

    ];

    protected function firstStepValidations(): array
    {
        return !empty($this->disabilityIdentityCard)
            ? array_merge($this->identityDetailValidations, [
                'form.photo' => ['nullable'],
            ])
            : array_merge($this->identityDetailValidations, [
                'form.photo' => ['required'],
            ]);
    }

    protected array $secondStepValidations = [
        'form.guardian_name' => ['required', 'string', 'max:255'],
        'form.guardian_name_en' => ['required', 'string', 'max:255'],
        'form.relationship_id' => ['required', 'exists:relationships,id'],
        'form.phone' => ['required'],
    ];




    public function messages(): array
    {
        return [

            'form.name.required' => ['नाम आवश्यक छ'],
            'form.is_citizenship.required' => ['आवश्यक छ'],
            'form.govern_disability_type_id.required' => ['आवश्यक छ'],
            'form.name_en.required' => ['अंग्रेजीमा नाम आवश्यक छ'],
            'form.gender.required' => ['लिङ्ग आवश्यक छ'],
            'form.ethnicity_id.required' => ['जातियता आवश्यक छ'],
            'form.dob_bs.required' => ['जन्म मिति नेपालीमा आवश्यक छ'],
            'form.dob_ad.required' => ['जन्म मिति अंग्रेजीमा आवश्यक छ'],
            'form.permanent_province_id.required' => ['स्थायी प्रदेश आवश्यक छ'],
            'form.permanent_district_id.required' => ['स्थायी जिल्ला आवश्यक छ'],
            'form.permanent_local_body_id.required' => ['स्थायी पालिका आवश्यक छ'],
            'form.permanent_ward.required' => ['स्थायी वार्ड आवश्यक छ'],
            'form.permanent_tole.required' => ['स्थायी टोल आवश्यक छ'],
            'form.temporary_province_id.required' => ['अस्थायी प्रदेश आवश्यक छ'],
            'form.temporary_district_id.required' => ['अस्थायी जिल्ला आवश्यक छ'],
            'form.temporary_local_body_id.required' => ['अस्थायी पालिका आवश्यक छ'],
            'form.temporary_ward.required' => ['अस्थायी वार्ड आवश्यक छ'],
            'form.temporary_tole.required' => ['अस्थायी टोल आवश्यक छ'],
            'form.finger_left.required' => ['वायाँ औठाको छाप आवश्यक छ'],
            'form.finger_right.required' => ['दायाँ औठाको छाप आवश्यक छ'],
            'form.photo.required' => ['फोटो आवश्यक छ'],
            'form.guardian_name.required' => ['अभिभावकको नाम आवश्यक छ'],
            'form.guardian_name_en.required' => ['अभिभावकको नाम अंग्रेजीमा आवश्यक छ'],
            'form.relationship_id.required' => ['सम्बन्ध आईडी आवश्यक छ'],
            'form.phone.required' => ['सम्पर्क नं आवश्यक छ'],
            'form.disability_type_id.required' => ['अपाङ्गताको प्रकार आवश्यक छ'],
            'form.blood_group.required' => ['रक्त समूह आवश्यक छ'],
            'form.disability_reason_id.required' => ['अपाङ्गताको कारण आवश्यक छ'],
            'form.identity_type.required' => ['पहिचान प्रकार आवश्यक छ'],
            'form.receiving_body.required' => ['कहाँ बाट आवश्यक छ'],
            'form.date_bs.required' => ['मिति वि.स मा आवश्यक छ'],
            'form.date_ad.required' => ['मिति ई.स मा आवश्यक छ'],
            'form.father_name.required' => ['वुबाको नाम आवश्यक छ'],
            'form.father_name_en.required' => ['वुबाको नाम अंग्रेजीमा आवश्यक छ'],
            'form.grand_father_name.required' => ['हजुरवुबाको नाम आवश्यक छ'],
            'form.grand_father_name_en.required' => ['हजुरवुबाको नाम अंग्रेजीमा आवश्यक छ'],
            'form.mother_name.required' => ['आमाको नाम आवश्यक छ'],
            'form.mother_name_en.required' => ['आमाको नाम अंग्रेजीमा आवश्यक छ'],
            'form.birth_registration_no.required_if' => ['जन्म दर्ता आवश्यक छ'],
            'form.birth_registration_place.required_if' => ['जन्मेको ठाउँ आवश्यक छ'],
            'form.birth_registration_bs.required_if' => ['जन्म दर्ता वि.स. मा आवश्यक छ'],
            'form.birth_registration_ad.required_if' => ['जन्म दर्ता ई.स. माआवश्यक छ'],
            'form.citizenship_no.required_if' => ['नागरिकता नं आवश्यक छ'],
            'form.citizenship_no_place.required_if' => ['नागरिकता पाएको स्थान आवश्यक छ'],
            'form.citizenship_no_bs.required_if' => ['नागरिकता पाएको मिति (बि.स.)आवश्यक छ'],
            'form.citizenship_no_ad.required_if' => ['नागरिकता पाएको मिति (ई.स.)आवश्यक छ'],
            'form.citizenship_photo.required' => ['नागरिकताको फोटोकपी आवश्यक छ'],
            'form.citizenship_photo_certificate.required' => ['जन्मदर्ताको फोटोकपी आवश्यक छ'],
            'form.is_necessary.required' => ['आवश्यक छ'],
            'form.material_description.required' => ['सामाग्री विवरण आवश्यक छ'],
            'form.qualification.required' => ['पछिल्लो सैक्षिक योग्यता आवश्यक छ'],
            'form.daily_activity.required' => ['दैनिक क्रियाकलाप गर्न आवश्यक छ'],
            'form.supporting_material.required' => ['साहायक सामाग्री प्रयोग गर्ने आवश्यक छ'],
            'form.material_name.required_if' => ['सामाग्रीको नाम आवश्यक छ'],
            'form.helping_task.required' => ['कामको नाम आवश्यक छ'],
            'form.without_helping_task.required' => ['कामको नाम आवश्यक छ'],
            'form.main_training_name.required' => ['नाम आवश्यक छ'],
            'form.provide_detail_full_name.required' => ['नाम आवश्यक छ'],
            'form.provide_detail_address.required' => ['ठेगाना आवश्यक छ'],
            'form.provide_detail_phone_no.required' => ['सम्पर्क नं. आवश्यक छ'],
            'form.provide_detail_citizenship_no.required' => ['नागरिकता नं आवश्यक छ'],
            'form.provide_detail_citizenship_no_date.required' => ['नागरिकता पाएको मिति आवश्यक छ'],
            'form.provide_detail_citizenship_no_place.required' => ['नागरिकता पाएको स्थान आवश्यक छ'],

        ];
    }


    public function rules(): array
    {

        return match ($this->currentStep) {
            1 => $this->firstStepValidations(),
            2 => $this->secondStepValidations,

            default => array_merge(
                $this->firstStepValidations(),
                $this->secondStepValidations,
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
        DB::transaction(function () {
             DisabilityIdentityCard::create($this->form);
        });

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'तपाइको अपाङ्गता परिचय पत्र दर्ता भयो'
        ]);
        $this->reset('form');
        return back();
    }




    public function render()
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

//        if ($this->form['is_necessary'] == 0) {
//            $this->form['material_description'] = null;
//        }
//        if ($this->form['supporting_material'] == 0) {
//            $this->form['material_name'] = null;
//        }
//
//        if ($this->form['finger_print_type'] == 'none') {
//            $this->form['right_finger'] = null;
//            $this->form['left_finger'] = null;
//        }



        return view('identity::livewire.disability-identity-card-livewire');
    }
}
