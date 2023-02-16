<?php

namespace Modules\TaskManagement\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\TaskManagement\Entities\Activity;

class ActivityLivewire extends Component
{
    use WithFileUploads;

    protected $listeners = ['dateChanged'];

    public $formActivity = [
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

    public Activity $DbActivity;

    public function mount($dbActivity = null)
    {
        if (!empty($dbActivity)) {
            $this->DbActivity = $dbActivity;
            $this->formActivity['date'] = $dbActivity->date;
            $this->formActivity['date_en'] = $dbActivity->date_en?->toDateString();
            $this->formActivity['remarks'] = $dbActivity->remarks;
            $list = [];
            foreach ($dbActivity->activityLists as $activityList) {
                $list[] = [
                    'id' => $activityList->id,
                    'title' => $activityList->title,
                    'description' => $activityList->description,
                    'remarks' => $activityList->remarks,
                ];
            }
            $this->formActivity['activity_lists'] = $list;
        }
    }

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->formActivity['date'] = $nepaliDate;
        $this->formActivity['date_en'] = $englishDate;
    }

    public function addActivity()
    {
        $this->formActivity['activity_lists'][] = [
            'title' => '',
            'description' => '',
            'remarks' => '',
        ];
    }

    protected $rules = [
        'formActivity.date' => ['required'],
        'formActivity.date_en' => ['required'],
        'formActivity.activity_lists' => ['required', 'array'],
        'formActivity.activity_lists.*.title' => ['required', 'string', 'max:255'],
        'formActivity.activity_lists.*.description' => ['nullable'],
        'formActivity.activity_lists.*.remarks' => ['nullable'],
        'formActivity.activity_lists.*.documents' => ['nullable', 'array'],
        'formActivity.activity_lists.*.documents.*' => ['file'],
        'formActivity.remarks' => ['nullable'],

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        DB::transaction(function () {
            if (!empty($this->DbActivity)) {
                $this->DbActivity->update($this->formActivity);
            } else {
                $this->DbActivity = Activity::create($this->formActivity + ['user_id' => auth()->id(), 'branch_id' => auth()->user()->branch_id]);
            }

            foreach ($this->formActivity['activity_lists'] as $activityList) {
                if (isset($activityList['id'])) {
                    $createdActivityList = $this->DbActivity->activityLists()->find($activityList['id']);
                    $createdActivityList->update($activityList);
                } else {
                    $createdActivityList = $this->DbActivity->activityLists()->create($activityList);
                }

                if (!empty($activityList['documents'])) {
                    $this->uploadDocuments($activityList['documents'], $createdActivityList);
                }
            }
        });

        $this->reset('formActivity');
        toast('Activity created successfully', 'success');
        return redirect()->route('admin.taskManagement.activity.index');

    }

    public function removeActivity($index)
    {
        $data = $this->formActivity['activity_lists'][$index];

        if (isset($data['id'])) {
            $activityList = $this->DbActivity->activityLists()->find($data['id']);
            if (!empty($activityList)) {
                $activityList->files()->delete();
                $activityList->delete();
            }
        }
        unset($this->formActivity['activity_lists'][$index]);

        $this->formActivity['activity_lists'] = array_values($this->formActivity['activity_lists']);
    }

    private function uploadDocuments($documents, $createdActivityList)
    {
        foreach ($documents as $document) {
            $createdActivityList->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('task-management/' . Str::slug($createdActivityList->title, '_'), 'public'),
            ]);
        }
    }

    public function render()
    {
        return view('taskmanagement::livewire.activity-livewire');
    }
}
