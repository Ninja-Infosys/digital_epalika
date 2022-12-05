<?php

namespace Modules\Plan\Http\Livewire;

use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Modules\Plan\Entities\ConsumerCommittee;
use Modules\Plan\Entities\ConsumerCommitteeOfficial;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ConsumerCommitteePostEnum;

class ConsumerCommitteeLivewire extends Component
{
    public Project $project;

    public array $form = [
        'name' => null,
        'address' => null,
        'phone' => null,
        'formation_date' => null,
        'committee_registration_date' => null,
        'meeting_date' => null,
        'registration_no' => null,
        'beneficiary_no' => null,
        'member_number' => null,
        'experience_in_project' => null,
        'consumerCommitteeOfficials' => []
    ];

    protected $listeners = ['formationDateChanged', 'committeeRegistrationDateChanged', 'meetingDateChanged'];

    public function mount(Project $project)
    {
        $this->assignConsumerCommitteeData($project);
    }

    public function formationDateChanged($nepaliDate, $englishDate)
    {
        $this->form['formation_date'] = $nepaliDate;
    }

    public function committeeRegistrationDateChanged($nepaliDate, $englishDate)
    {
        $this->form['committee_registration_date'] = $nepaliDate;
    }

    public function meetingDateChanged($nepaliDate, $englishDate)
    {
        $this->form['meeting_date'] = $nepaliDate;
    }

    public function removeConsumerCommitteeOfficials($index)
    {
        if (!empty($this->form['consumerCommitteeOfficials'][$index]['id'])) {
            ConsumerCommitteeOfficial::find($this->form['consumerCommitteeOfficials'][$index]['id'])->delete();
        }
        unset($this->form['consumerCommitteeOfficials'][$index]);
        $this->form['consumerCommitteeOfficials'] = array_values($this->form['consumerCommitteeOfficials']);
    }

    private function assignConsumerCommitteeData($project)
    {
        $this->project = $project->load('consumerCommittee.consumerCommitteeOfficials');
        if ($consumerCommittee = $project->consumerCommittee) {
            foreach ($this->form as $key => $data) {
                if ($key != 'consumerCommitteeOfficials') {
                    $this->form[$key] = $consumerCommittee[$key];
                }
            }
        }
        foreach (($consumerCommittee->consumerCommitteeOfficials ?? collect()) as $consumerCommitteeOfficial) {
            $this->form['consumerCommitteeOfficials'][] = [
                'id' => $consumerCommitteeOfficial->id ?? null,
                'post' => $consumerCommitteeOfficial->post ?? null,
                'name' => $consumerCommitteeOfficial->name ?? null,
                'father_name' => $consumerCommitteeOfficial->father_name ?? null,
                'grandfather_name' => $consumerCommitteeOfficial->grandfather_name ?? null,
                'address' => $consumerCommitteeOfficial->address ?? null,
                'gender' => $consumerCommitteeOfficial->gender ?? null,
                'phone' => $consumerCommitteeOfficial->phone ?? null,
                'citizenship_no' => $consumerCommitteeOfficial->citizenship_no ?? null,
            ];
        }
    }

    public function rules(): array
    {
        return [
            'form.name' => ['required'],
            'form.address' => ['nullable'],
            'form.phone' => ['nullable'],
            'form.formation_date' => ['required'],
            'form.committee_registration_date' => ['required'],
            'form.meeting_date' => ['nullable'],
            'form.registration_no' => ['required'],
            'form.beneficiary_no' => ['required', 'integer'],
            'form.member_number' => ['required', 'integer'],
            'form.experience_in_project' => ['nullable'],
            'form.consumerCommitteeOfficials' => ['nullable', 'array'],
            'form.consumerCommitteeOfficials.*.post' => ['required', new Enum(ConsumerCommitteePostEnum::class)],
            'form.consumerCommitteeOfficials.*.name' => ['required'],
            'form.consumerCommitteeOfficials.*.father_name' => ['nullable'],
            'form.consumerCommitteeOfficials.*.grandfather_name' => ['nullable'],
            'form.consumerCommitteeOfficials.*.address' => ['nullable'],
            'form.consumerCommitteeOfficials.*.gender' => ['nullable'],
            'form.consumerCommitteeOfficials.*.phone' => ['nullable'],
            'form.consumerCommitteeOfficials.*.citizenship_no' => ['nullable'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setConsumerCommitteeMembers()
    {
        if (count($this->form['consumerCommitteeOfficials']) < $this->form['member_number']) {
            for ($i = count($this->form['consumerCommitteeOfficials']); $i < $this->form['member_number']; $i++) {
                $this->form['consumerCommitteeOfficials'][] = [];
            }
        }
    }

    public function submitFormData()
    {
        $formData = $this->validate()['form'];

        $consumerCommittee = ConsumerCommittee::updateOrCreate(
            ['project_id' => $this->project->id],
            [
                'name' => $formData['name'],
                'address' => $formData['address'],
                'phone' => $formData['phone'],
                'formation_date' => $formData['formation_date'],
                'committee_registration_date' => $formData['committee_registration_date'],
                'meeting_date' => $formData['meeting_date'],
                'registration_no' => $formData['registration_no'],
                'beneficiary_no' => $formData['beneficiary_no'],
                'member_number' => $formData['member_number'],
                'experience_in_project' => $formData['experience_in_project']
            ]
        );

        foreach ($this->form['consumerCommitteeOfficials'] as $consumerCommitteeOfficial) {
            ConsumerCommitteeOfficial::updateOrCreate(
                ['consumer_committee_id' => $consumerCommittee->id, 'id' => $consumerCommitteeOfficial['id'] ?? null],
                $consumerCommitteeOfficial
            );
        }

        $this->reset('form');
        $this->assignConsumerCommitteeData($this->project);

        $this->dispatchBrowserEvent('toast_message', [
            'type' => 'success',
            'title' => 'उपभोक्ता समिति सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function render()
    {
        return view('plan::livewire.consumer-committee-livewire');
    }
}
