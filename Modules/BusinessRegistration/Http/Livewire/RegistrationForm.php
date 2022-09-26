<?php

namespace Modules\BusinessRegistration\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $province_id = '';
    public $district_id = '';
    public $local_body_id = '';
    public $ward_no = '';

    public int $currentStep = 1;

    public $provinces = [];
    public $districts = [];
    public $all_districts = [];
    public $localBodies = [];
    public $wards = '';

    public array $form = [
        'name' => null,
        'gender' => null,
        'phone' => null,
        'email' => null,
        'citizenship_no' => null,
        'issue_date' => null,
        'issue_district' => null,
        'province_id' => null,
        'district_id' => null,
        'local_body_id' => null,
        'ward_no' => null,
        'way' => null,
        'tole' => null


    ];


    public function mount()
    {
        $this->provinces = Province::all();
        $this->all_districts = District::all();
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
        'form.phone' => ['required'],
        'form.email' => ['nullable', 'email'],
        'form.citizenship_no' => ['required'],
        'form.issue_date' => ['required'],
        'form.issue_district' => ['required'],
        'form.province_id' => ['required'],
        'form.district_id' => ['required'],
        'form.local_body_id' => ['required'],
        'form.way' => ['nullable'],
        'form.tole' => ['nullable'],
    ];

    protected array $secondStepValidations = [

    ];

    protected array $thirdStepValidations = [

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
            default:
            {
                return array_merge($this->firstStepValidations, $this->secondStepValidations);
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {

    }

    public function render()
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
        return view('businessregistration::livewire.registration-form');
    }
}
