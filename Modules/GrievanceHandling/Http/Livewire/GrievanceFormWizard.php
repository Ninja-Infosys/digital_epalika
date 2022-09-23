<?php

namespace Modules\GrievanceHandling\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\GrievanceHandling\Entities\GrievanceOffice;
use Modules\GrievanceHandling\Entities\GrievanceType;
use Modules\GrievanceHandling\Entities\GrievanceUser;

class GrievanceFormWizard extends Component
{
    use WithFileUploads;

    public $grievanceTypes = [];
    public $grievanceOffices = [];

    public int $currentStep = 1;
    public bool $is_password = false;

    public array $form = [
        'grievance_type_id' => null,
        'description' => null,
        'grievance_office_id' => null,
        'complaint_severity' => null,
        'subject' => null,
        'password' => null,
        'password_confirmation' => null,
        'is_open' => 0,
        'name' => null,
        'email' => null,
        'phone' => null,
        'address' => null
    ];

    protected array $firstStepValidations = [
        'form.grievance_type_id' => ['required', 'exists:grievance_types,id'],
        'form.description' => ['required'],
        'form.files' => ['required', 'array'],
        'form.files.*' => ['image', 'max:10240'],
        'form.grievance_office_id' => ['required', 'exists:grievance_offices,id'],
        'form.complaint_severity' => ['required'],
        'form.subject' => ['required']
    ];
    protected array $secondStepValidations = [
        'form.password' => ['required_if:is_password,1'],
        'form.password_confirmation' => ['nullable', 'confirmed'],
        'form.is_open' => ['nullable', 'boolean'],
        'form.name' => ['required'],
        'form.email' => ['required', 'email'],
        'form.phone' => ['required'],
        'form.address' => ['required']
    ];

    public function mount()
    {
        $this->grievanceTypes = GrievanceType::all();
        $this->grievanceOffices = GrievanceOffice::all();
    }

    public function backStep($step)
    {
        $this->currentStep = $step;
    }

    public function rules()
    {
        switch ($this->currentStep) {
            case 1:
            {
                return $this->firstStepValidations;
            }
            case 2:
            {
                return $this->secondStepValidations;
            }
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

    public function nextStep($step)
    {
        $this->validate();
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        $this->validate();
        DB::transaction(function () {
            $grievanceUser = GrievanceUser::where('email', $this->form['email'])->first();
            if (empty($grievanceUser)) {
                $grievanceUser = GrievanceUser::create([
                    'name' => $this->form['name'],
                    'email' => $this->form['email'],
                    'phone' => $this->form['phone'],
                    'address' => $this->form['address'],
                    'password' => $this->form['password'] ?? ""
                ]);
            }

            $grievanceDetail = $grievanceUser->grievanceDetails()->create([
                'token' => time(),
                'grievance_type_id' => $this->form['grievance_type_id'],
                'description' => $this->form['description'],
                'grievance_office_id' => $this->form['grievance_office_id'],
                'complaint_severity' => $this->form['complaint_severity'],
                'subject' => $this->form['subject'],
                'is_open' => $this->form['is_open'],
            ]);
            foreach ($this->form['files'] as $file) {
                $grievanceDetail->files()->create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $file->getClientOriginalExtension(),
                    'file' => $file->store('grievance/files/' . Str::slug($grievanceUser->name, '_'), 'public'),
                ]);
            }
        });

        $this->reset('form', 'currentStep', 'is_password');
        dd('success');

    }

    public function messages(): array
    {
        return [
            'form.grievance_type_id.required' => ['grievance type is required']
        ];
    }

    public function render()
    {
        return view('grievancehandling::livewire.grievance-form-wizard');
    }
}
