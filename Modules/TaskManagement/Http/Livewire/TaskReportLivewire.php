<?php

namespace Modules\TaskManagement\Http\Livewire;

use App\Models\Settings\Branch;
use Livewire\Component;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class TaskReportLivewire extends Component
{
    public $branches = [];
    public $taskCategories = [];
    public $taskDivisions = [];

    public array $form = [
        'from_date' => null,
        'to_date' => null,
        'branch_id' => null,
        'task_category_id' => null,
        'task_division_id' => null,
    ];

    public function mount(){
        $this->branches = Branch::with('branches')->whereNull('branch_id')->get();
    }

    protected $listeners=['fromDateChanged','toDateChanged'];

    public function fromDateChanged($nepaliDate, $englishDate)
    {
        $this->form['from_date'] = $nepaliDate;
    }

    public function toDateChanged($nepaliDate, $englishDate)
    {
        $this->form['to_date'] = $nepaliDate;
    }

    public function render()
    {
        if (!empty($this->form['branch_id'])) {
            $this->taskCategories = TaskCategory::where('branch_id', $this->form['branch_id'])->get();
        }
        if (!empty($this->form['task_category_id'])) {
            $this->taskDivisions = TaskDivision::where('task_category_id', $this->form['task_category_id'])->get();
        }
        return view('taskmanagement::livewire.task-report-livewire');
    }
    public function submitFormData(){

    }
}
