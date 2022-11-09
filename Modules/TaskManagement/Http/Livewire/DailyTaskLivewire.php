<?php

namespace Modules\TaskManagement\Http\Livewire;

use App\Models\Settings\Branch;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\TaskManagement\Entities\DailyTask;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class DailyTaskLivewire extends Component
{
    use WithFileUploads;

    public $branches = [];
    public $taskCategories = [];
    public $taskDivisions = [];

    public object $dailyTask;

    public array $form = [
        'date' => null,
        'en_date' => null,
        'branch_id' => null,
        'task_category_id' => null,
        'task_division_id' => null,
        'documents' => null,
        'documents.*' => null,
        'remarks' => null
    ];

    public function mount($dailyTask=null)
    {
        if(!empty($dailyTask)){
            $this->dailyTask=$dailyTask;
            $this->form = [
                'date' => $dailyTask->date,
                'en_date' => $dailyTask->en_date,
                'branch_id' => $dailyTask->taskDivision->taskCategory->branch_id ?? '',
                'task_category_id' => $dailyTask->taskDivision->task_category_id ?? '',
                'task_division_id' => $dailyTask->task_division_id ?? '',
                'remarks' => $dailyTask->remarks,
            ];
        }
        $this->branches = Branch::with('branches')->whereNull('branch_id')->get();
    }

    protected function getListeners(): array
    {
        return ['postAdded' => 'incrementPostCount'];
    }

    public function incrementPostCount($nepaliDate, $englishDate)
    {
        $this->form['date'] =!$this->form['date'] ? $nepaliDate:$this->form['date'];
        $this->form['en_date'] = $englishDate;
    }

    protected array $rules = [
        'form.date' => ['required'],
        'form.en_date' => ['required', 'date'],
        'form.branch_id' => ['required', 'exists:branches,id'],
        'form.task_category_id' => ['required', 'exists:task_categories,id'],
        'form.task_division_id' => ['required', 'exists:task_divisions,id'],
        'form.documents' => ['nullable', 'array'],
        'form.documents.*' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
        'form.remarks' => ['nullable']
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submitFormData()
    {
        $formData = $this->validate()['form'];

        DB::transaction(function () use ($formData) {
            if($dailyTask=$this->dailyTask){
                $dailyTask->update($formData);
            }else{
                $dailyTask = DailyTask::create([
                    'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                    'date' => $formData['date'],
                    'en_date' => $formData['en_date'],
                    'task_division_id' => $formData['task_division_id'],
                    'remarks' => $formData['remarks'],
                ]);
            }
            if (!empty($this->form['documents'])) {
                foreach ($this->form['documents'] as $document) {
                    $dailyTask->files()->create([
                        'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                        'extension' => $document->getClientOriginalExtension(),
                        'file' => $document->store('task_management/daily_tasks/documents', 'public')
                    ]);
                }
            }
        });

        if($this->dailyTask){
            $this->dispatchBrowserEvent('alert_message', [
                'type' => "success",
                'title' => "धन्यबाद",
                'text' => "उजुरी पत्र सफलतापूर्वक updated",
            ]);
            return redirect(route('admin.taskManagement.dailyTask.index'));
        }else{
            $this->reset('form', 'taskCategories', 'taskDivisions');

            $this->dispatchBrowserEvent('alert_message', [
                'type' => "success",
                'title' => "धन्यबाद",
                'text' => "उजुरी पत्र सफलतापूर्वक थपियो",
            ]);
        }
    }

    public function render()
    {
        if (!empty($this->form['branch_id'])) {
            $this->taskCategories = TaskCategory::where('branch_id', $this->form['branch_id'])->get();
        }
        if (!empty($this->form['task_category_id'])) {
            $this->taskDivisions = TaskDivision::where('task_category_id', $this->form['task_category_id'])->get();
        }

        return view('taskmanagement::livewire.daily-task-livewire');
    }
}
