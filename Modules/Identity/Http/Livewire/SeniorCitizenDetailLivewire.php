<?php

namespace Modules\Identity\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\Settings\OfficeSetting;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Identity\Entities\EmployeeSignature;
use Modules\Identity\Entities\FingerPrint;
use Modules\Identity\Entities\SeniorCitizenDetail;

class SeniorCitizenDetailLivewire extends Component
{
    use WithFileUploads;

    public $provinces = [];
    public $districts = [];
    public $localBodies = [];
    public $wards = '';
    public $employeeSignatures = [];

    public SeniorCitizenDetail $seniorCitizenDetail;
    public array $form = [
        'photo' => null,
        'left_finger' => null,
        'right_finger' => null,
        'name' => null,
        'name_en' => null,
        'dob_bs' => null,
        'card_no' => null,
        'gender' => null,
        'citizenship_no' => null,
        'issue_date_bs' => null,
        'spouse' => null,
        'spouse_en' => null,
        'blood_group' => null,
        'father_name' => null,
        'father_name_en' => null,
        'mother_name_en' => null,
        'mother_name' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'tole' => null,
        'patrons_name' => null,
        'patrons_name_en' => null,
        'patrons_name_address' => null,
        'contact_person_name' => null,
        'contact_person_name_en' => null,
        'contact_person_phone' => null,
        'contact_person_address' => null,
        'is_disease' => 0,
        'disease_name' => null,
        'description' => null,
        'description_en' => null,
        'is_medicine' => 0,
        'medicine_name' => null,
        'employee_signature_id' => null,
    ];

    public function mount($seniorCitizenDetail = null): void
    {
        $officeSetting = OfficeSetting::first();
        $this->employeeSignatures = EmployeeSignature::Status()->get();
        $this->provinces = Province::all();

        if (!empty($seniorCitizenDetail)) {
            $this->seniorCitizenDetail = $seniorCitizenDetail;
            foreach (Arr::except($this->form, ['photo', 'left_finger', 'right_finger']) as $key => $data) {
                $this->form[$key] = $seniorCitizenDetail[$key];
            }

            if ($seniorCitizenDetail->fingerprints->count() > 0) {
                if (!empty($rightFinger = $seniorCitizenDetail->fingerprints->where('finger', 'right')->first())) {
                    $this->form['right_finger'] = [
                        'id' => $rightFinger->id,
                        'image' => $rightFinger->finger_image,
                        'isoTemplate' => $rightFinger->iso_temp,
                        'ansiTemplate' => $rightFinger->ansi_temp,
                        'isoImage' => $rightFinger->iso_image,
                        'quality' => $rightFinger->quality
                    ];
                }
                if (!empty($leftFinger = $seniorCitizenDetail->fingerprints->where('finger', 'left')->first())) {
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
            $this->form['province_id'] = $officeSetting->province_id;
            $this->form['district_id'] = $officeSetting->district_id;
            $this->form['local_body_id'] = $officeSetting->local_body_id;
        }
    }

    protected $listeners = ['dobChanged','issueDateChanged','photoUpdated', 'setRight' => 'setRightThumb',
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

    public function dobChanged($nepaliDate): void
    {
        $this->form['dob_bs'] = $nepaliDate;
    }
    public function issueDateChanged($nepaliDate): void
    {
        $this->form['issue_date_bs'] = $nepaliDate;
    }

    public function photoUpdated($base64String): void
    {
        $this->form['photo'] = $base64String;
    }

    public function rules(): array
    {
        return !empty($this->seniorCitizenDetail)
            ? array_merge($this->validationRules, [
                'form.photo' => ['nullable'],
                'form.left_finger' => ['nullable'],
                'form.right_finger' => ['nullable'],
            ])
            : array_merge($this->validationRules, [
                'form.photo' => ['required'],
                'form.left_finger' => ['required'],
                'form.right_finger' => ['required'],
            ]);
    }

    protected array $validationRules = [
        'form.name' => ['required', 'string', 'max:255'],
        'form.name_en' => ['required', 'string', 'max:255'],
        'form.dob_bs' => ['required'],
        'form.card_no' => ['required'],
        'form.gender' => ['required'],
        'form.citizenship_no' => ['required'],
        'form.issue_date_bs' => ['required'],
        'form.spouse' => ['required', 'string', 'max:255'],
        'form.spouse_en' => ['required', 'string', 'max:255'],
        'form.blood_group' => ['required'],
        'form.father_name' => ['required', 'string', 'max:255'],
        'form.father_name_en' => ['required', 'string', 'max:255'],
        'form.mother_name_en' => ['required', 'string', 'max:255'],
        'form.mother_name' => ['required', 'string', 'max:255'],
        'form.province_id' => ['required', 'exists:provinces,id'],
        'form.district_id' => ['required', 'exists:districts,id'],
        'form.local_body_id' => ['required', 'exists:local_bodies,id'],
        'form.ward_no' => ['required', 'integer'],
        'form.tole' => ['required'],
        'form.patrons_name' => ['required', 'string', 'max:255'],
        'form.patrons_name_en' => ['required', 'string', 'max:255'],
        'form.patrons_name_address' => ['required', 'string', 'max:255'],
        'form.contact_person_name' => ['required', 'string', 'max:255'],
        'form.contact_person_name_en' => ['required', 'string', 'max:255'],
        'form.contact_person_phone' => ['required'],
        'form.contact_person_address' => ['required', 'string', 'max:255'],
        'form.is_disease' => ['required', 'boolean'],
        'form.disease_name' => ['required_if:form.is_disease,==,1'],
        'form.description' => ['required'],
        'form.description_en' => ['required'],
        'form.is_medicine' => ['required', 'boolean'],
        'form.medicine_name' => ['required_if:form.is_medicine,==,1'],
        'form.employee_signature_id' => ['required', 'exists:employee_signatures,id'],
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveForm(): Redirector|RedirectResponse|Application
    {

        $this->validate()['form'];
        if (!empty($this->seniorCitizenDetail)) {
            $this->seniorCitizenDetail->update($this->validate()['form']);
            if (!empty($this->form['left_finger']['id'])) {
                Fingerprint::find($this->form['left_finger']['id'])->update([
                    'finger_image' => $this->form['left_finger']['image'],
                    'iso_temp' => $this->form['left_finger']['isoTemplate'],
                    'ansi_temp' => $this->form['left_finger']['ansiTemplate'],
                    'iso_image' => $this->form['left_finger']['isoImage'],
                    'quality' => $this->form['left_finger']['quality'],
                ]);
            }
            if (!empty($this->form['right_finger']['id'] )) {
                Fingerprint::find($this->form['right_finger']['id'])->update([
                    'finger_image' => $this->form['right_finger']['image'],
                    'iso_temp' => $this->form['right_finger']['isoTemplate'],
                    'ansi_temp' => $this->form['right_finger']['ansiTemplate'],
                    'iso_image' => $this->form['right_finger']['isoImage'],
                    'quality' => $this->form['right_finger']['quality'],
                ]);
            }
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'success',
                'title' => ' जेस्ठ नागरिक विवरण सफलतापुर्बक अध्याबधिक भयो'
            ]);
            return redirect(route('identity.admin.seniorCitizenDetail.index'));
        }

        DB::transaction(function () {
            $seniorCitizenDetail = SeniorCitizenDetail::create($this->validate()['form']);
            $seniorCitizenDetail->fingerPrints()->create([
                'finger_image' => $this->form['left_finger']['image'],
                'iso_temp' => $this->form['left_finger']['isoTemplate'],
                'ansi_temp' => $this->form['left_finger']['ansiTemplate'],
                'iso_image' => $this->form['left_finger']['isoImage'],
                'finger' => 'left',
                'quality' => $this->form['left_finger']['quality'],
                'user_id' => auth()->id(),
            ]);
            $seniorCitizenDetail->fingerPrints()->create([
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
            'title' => 'तपाइको  जेस्ठ नागरिक विवरण  दर्ता भयो'
        ]);
        $this->reset('form');
        return back();
    }

    public
    function render(): Factory|View|Application
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
        if ($this->form['is_disease'] == '0') {
            $this->form['disease_name'] = null;
        }
        if ($this->form['is_medicine'] == '0') {
            $this->form['medicine_name'] = null;
        }

        return view('identity::livewire.senior-citizen-detail-livewire');
    }
}
