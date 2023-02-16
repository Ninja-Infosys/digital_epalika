<?php

namespace Modules\TaskManagement\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ActivityLivewire extends Component
{
    use WithFileUploads;

    protected $listeners = ['dateChanged'];

    public $activity = [
        'date' => '',
        'date_en' => '',
        'remarks' => '',
        'activity_lists' => [
            [
                'title' => '',
                'description' => '',
                'remarks' => '',
            ]
        ]
    ];

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->activity['date'] = $nepaliDate;
        $this->activity['date_en'] = $englishDate;
    }

    public function addActivity()
    {
        $this->activity['activity_lists'][] = [
            'title' => '',
            'description' => '',
            'remarks' => '',
        ];
    }

    protected $rules = [
        'activity.date' => 'required',
        'activity.date_en' => 'required',
        'activity.activity_lists.*.title' => 'required',
        'activity.activity_lists.*.description' => 'required',
        'activity.remarks' => ['nullable'],

    ];

    public function removeActivity($index)
    {
        unset($this->activity['activity_lists'][$index]);

        $this->activity['activity_lists'] = array_values($this->activity['activity_lists']);
    }

    public function render()
    {
        return view('taskmanagement::livewire.activity-livewire');
    }
}
