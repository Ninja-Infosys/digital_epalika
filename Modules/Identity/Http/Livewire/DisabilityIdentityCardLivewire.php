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
    public $occupations = [];
    public $disabilityTypes = [];
    public $governmentDisabilityTypes = [];
    public $disabilityReasons = [];
    public $ethnicities = [];
    public $provinces = [];
    public $permanent_districts = [];
    public $permanent_localBodies = [];
    public $permanent_wards = [];
    public $temporary_districts = [];
    public $temporary_localBodies = [];
    public $temporary_wards = [];
    public $employee_signatures = [];

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
        'govern_disability_type_id' => null,
        'employee_signature_id' => null,
        'card_no' => null
    ];

    public function mount($disabilityIdentityCard = null): void
    {
        $officeSetting = OfficeSetting::first();
        $this->provinces = get_provinces();
        $this->ethnicities = Ethnicity::all();
        $this->relations = Relationship::all();
        $this->disabilityTypes = DisabilityType::all();
        $this->governmentDisabilityTypes = GovernmentalDisabilityType::all();
        $this->disabilityReasons = DisabilityReason::all();
        $this->occupations = Occupation::all();
        $this->employee_signatures = EmployeeSignature::status()->get();


        if (!empty($disabilityIdentityCard)) {
            $this->disabilityIdentityCard = $disabilityIdentityCard;
            foreach ($this->form as $key => $data) {
                if (!in_array($key, ['photo', 'citizenship_photo', 'citizenship_photo_certificate'])) {
                    $this->form[$key] = $disabilityIdentityCard[$key];
                }
            }

            if ($disabilityIdentityCard->fingerprints->count() > 0) {
                if (!empty($rightFinger = $disabilityIdentityCard->fingerprints->where('finger', 'right')->first())) {
                    $this->form['right_finger'] = [
                        'id' => $rightFinger->id,
                        'image' => $rightFinger->finger_image,
                        'isoTemplate' => $rightFinger->iso_temp,
                        'ansiTemplate' => $rightFinger->ansi_temp,
                        'isoImage' => $rightFinger->iso_image,
                        'quality' => $rightFinger->quality
                    ];
                }

                if (!empty($leftFinger = $disabilityIdentityCard->fingerprints->where('finger', 'left')->first())) {
                    $this->form['left_finger'] = [
                        'id' => $leftFinger->id,
                        'image' => $leftFinger->finger_image,
                        'isoTemplate' => $leftFinger->iso_temp,
                        'ansiTemplate' => $leftFinger->ansi_temp,
                        'isoImage' => $leftFinger->iso_image,
                        'quality' => $leftFinger->quality
                    ];
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

    protected $listeners = ['dobChanged', 'dateChanged', 'birthRegistrationChanged', 'citizenshipNoChanged', 'photoUpdated', 'setRight' => 'setRightThumb',
        'setLeft' => 'setLeftThumb',];

    public function setRightThumb($image, $isoTemplate, $ansiTemplate, $isoImage, $quality)
    {
        $this->form['right_finger'] = [
            'id' => $this->form['right_finger']['id'] ?? null,
            'image' => $image,
            'isoTemplate' => $isoTemplate,
            'ansiTemplate' => $ansiTemplate,
            'isoImage' => $isoImage,
            'quality' => $quality,
        ];
    }

    public function setLeftThumb($image, $isoTemplate, $ansiTemplate, $isoImage, $quality)
    {
        $this->form['left_finger'] = [
            'id' => $this->form['left_finger']['id'] ?? null,
            'image' => $image,
            'isoTemplate' => $isoTemplate,
            'ansiTemplate' => $ansiTemplate,
            'isoImage' => $isoImage,
            'quality' => $quality,
        ];


    }

    public function photoUpdated($base64String): void
    {
        $this->form['photo'] = $base64String;
    }

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
                'form.left_finger' => ['nullable'],
                'form.right_finger' => ['nullable'],
                'form.photo' => ['nullable'],
            ])
            : array_merge($this->identityDetailValidations, [
                'form.right_finger' => ['required_if:form.finger_print_type,==,legs,finger'],
                'form.left_finger' => ['required_if:form.finger_print_type,==,legs,finger'],
                'form.photo' => ['required'],
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
        'form.govern_disability_type_id' => ['required', 'exists:governmental_disability_types,id'],
    ];
    protected array $fourthStepValidations = [
        'form.identity_type' => ['required'],
        'form.receiving_body' => ['required_if:form.identity_type,==,receive'],
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
        'form.employee_signature_id' => ['required', 'exists:employee_signatures,id']
    ];

    public function messages(): array
    {
        return [
            'form.finger_print_type.required' => ['औलाको छाप आवश्यक छ'],
            'form.left_finger.required_if' => ['बायाँ औंला आवश्यक छ'],
            'form.right_finger.required_if' => ['दाहिने औंला आवश्यक छ'],
            'form.name.required' => ['नाम आवश्यक छ'],
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
            'form.birth_registration_no.required' => ['जन्म दर्ता आवश्यक छ'],
            'form.birth_registration_place.required' => ['जन्मेको ठाउँ आवश्यक छ'],
            'form.birth_registration_bs.required' => ['जन्म दर्ता वि.स. मा आवश्यक छ'],
            'form.birth_registration_ad.required' => ['जन्म दर्ता ई.स. माआवश्यक छ'],
            'form.citizenship_no.required' => ['नागरिकता नं आवश्यक छ'],
            'form.citizenship_no_place.required' => ['नागरिकता पाएको स्थान आवश्यक छ'],
            'form.citizenship_no_bs.required' => ['नागरिकता पाएको मिति (बि.स.)आवश्यक छ'],
            'form.citizenship_no_ad.required' => ['नागरिकता पाएको मिति (ई.स.)आवश्यक छ'],
            'form.citizenship_photo.required' => ['नागरिकताको फोटोकपी आवश्यक छ'],
            'form.citizenship_photo_certificate.required' => ['जन्मदर्ताको फोटोकपी आवश्यक छ'],
            'form.is_necessary.required' => ['आवश्यक छ'],
            'form.material_description.required' => ['सामाग्री विवरण आवश्यक छ'],
            'form.qualification.required' => ['पछिल्लो सैक्षिक योग्यता आवश्यक छ'],
            'form.daily_activity.required' => ['दैनिक क्रियाकलाप गर्न आवश्यक छ'],
            'form.supporting_material.required' => ['साहायक सामाग्री प्रयोग गर्ने आवश्यक छ'],
            'form.material_name.required' => ['सामाग्रीको नाम आवश्यक छ'],
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
            3 => $this->thirdStepValidations,
            4 => $this->fourthStepValidations,
            5 => $this->fifthStepValidations(),
            6 => $this->sixthStepValidations,
            7 => $this->seventhStepValidations,
            8 => $this->eighthStepValidations,
            9 => $this->ninthStepValidations,

            default => array_merge(
                $this->firstStepValidations(),
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
            if ($this->form['finger_print_type'] !== 'none') {
                if (!empty($this->form['left_finger']['id'])) {
                    $this->disabilityIdentityCard
                        ->fingerPrints
                        ->where('id', $this->form['left_finger']['id'])
                        ->first()
                        ?->update([
                            'finger_image' => $this->form['left_finger']['image'],
                            'iso_temp' => $this->form['left_finger']['isoTemplate'],
                            'ansi_temp' => $this->form['left_finger']['ansiTemplate'],
                            'iso_image' => $this->form['left_finger']['isoImage'],
                            'quality' => $this->form['left_finger']['quality'],
                        ]);
                }
                if (!empty($this->form['right_finger']['id'])) {
                    $this->disabilityIdentityCard
                        ->fingerPrints
                        ->where('id', $this->form['right_finger']['id'])
                        ->first()
                        ?->update([
                            'finger_image' => $this->form['right_finger']['image'],
                            'iso_temp' => $this->form['right_finger']['isoTemplate'],
                            'ansi_temp' => $this->form['right_finger']['ansiTemplate'],
                            'iso_image' => $this->form['right_finger']['isoImage'],
                            'quality' => $this->form['right_finger']['quality'],
                        ]);
                }
            }
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'success',
                'title' => 'अपाङ्गता परिचय पत्र सफलतापुर्बक अध्याबधिक भयो'
            ]);
            return redirect(route('identity.admin.disabilityIdentityCard.index'));
        }
        DB::transaction(function () {
            $disabilityIdentityCard = DisabilityIdentityCard::create($this->form);
            $disabilityIdentityCard->fingerPrints()->create([
                'finger_image' => $this->form['left_finger']['image'],
                'iso_temp' => $this->form['left_finger']['isoTemplate'],
                'ansi_temp' => $this->form['left_finger']['ansiTemplate'],
                'iso_image' => $this->form['left_finger']['isoImage'],
                'finger' => 'left',
                'quality' => $this->form['left_finger']['quality'],
                'user_id' => auth()->id(),
            ]);
            $disabilityIdentityCard->fingerPrints()->create([
                'finger_image' => $this->form['right_finger']['image'],
                'iso_temp' => $this->form['right_finger']['isoTemplate'],
                'ansi_temp' => $this->form['right_finger']['ansiTemplate'],
                'iso_image' => $this->form['right_finger']['isoImage'],
                'finger' => 'right',
                'quality' => $this->form['right_finger']['quality'],
                'user_id' => auth()->id(),
            ]);

        });

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
        if (!empty($this->disabilityIdentityCard)) {
            $this->disabilityIdentityCard->update([
                'helping_task' => $this->form['helping_task']
            ]);
        }
    }

    public function withoutHelpingTaskIncrement(): void
    {
        $this->form['without_helping_task'][] = [];
    }

    public function withoutHelpingTaskDecrement($index): void
    {
        unset($this->form['without_helping_task'][$index]);
        $this->form['without_helping_task'] = array_values($this->form['without_helping_task']);
        if (!empty($this->disabilityIdentityCard)) {
            $this->disabilityIdentityCard->update([
                'without_helping_task' => $this->form['without_helping_task']
            ]);
        }
    }

    public function render(): Factory|View|Application
    {
        if (!empty($this->form['permanent_province_id'])) {
            $this->permanent_districts = get_districts($this->form['permanent_province_id']);
        }
        if (!empty($this->form['permanent_district_id'])) {
            $this->permanent_localBodies = get_local_bodies($this->form['permanent_district_id']);
        }
        if (!empty($this->form['permanent_local_body_id'])) {
            $this->permanent_wards = get_local_bodies(localBodyId: $this->form['permanent_local_body_id'])->ward_no;
        }

        if (!empty($this->form['temporary_province_id'])) {
            $this->temporary_districts = get_districts($this->form['temporary_province_id']);
        }
        if (!empty($this->form['temporary_district_id'])) {
            $this->temporary_localBodies = get_local_bodies($this->form['temporary_district_id']);
        }
        if (!empty($this->form['temporary_local_body_id'])) {
            $this->temporary_wards = get_local_bodies(localBodyId: $this->form['temporary_local_body_id'])->ward_no;
        }

        if ($this->form['is_necessary'] == 0) {
            $this->form['material_description'] = null;
        }

        if ($this->form['finger_print_type'] == 'none') {
            $this->form['right_finger'] = null;
            $this->form['left_finger'] = null;
        }

        if ($this->form['identity_type'] == 'not_receive') {
            $this->form['card_no'] = DB::table('disability_identity_cards')->max('id') + 1;
            $this->form['receiving_body'] = ReceivingBodyEnum::LOCAL_BODY->value;
            $this->form['date_bs'] = $this->get_today_nepali_date();
            $this->form['date_ad'] = today()->toDateString();
        }

        return view('identity::livewire.disability-identity-card-livewire');
    }
}
