<?php

namespace Modules\TaskManagement\Http\Livewire;

use App\Models\Settings\Branch;
use Illuminate\Console\View\Components\Task;
use Livewire\Component;
use Modules\TaskManagement\Entities\DailyTask;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class TaskReportLivewire extends Component
{
    public $branches = [];
    public $taskCategories = [];
    public $taskDivisions = [];
    public $dailyTasks = [];

    public array $form = [
        'from_date' => null,
        'to_date' => null,
        'branch_id' => [],
        'task_category_id' => [],
        'task_division_id' => [],
    ];

    public function mount()
    {
        $this->branches = Branch::all();
    }

    protected $listeners = ['fromDateChanged', 'toDateChanged'];

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
            $this->taskCategories = TaskCategory::whereIn('branch_id', $this->form['branch_id'])->get();
        }
        if (!empty($this->form['task_category_id'])) {
            $this->taskDivisions = TaskDivision::whereIn('task_category_id', $this->form['task_category_id'])->get();
        }

        $this->dailyTasks = DailyTask::with('taskDivision.taskCategory')->where(function ($query) {
            if (!empty($this->form['from_date'])) {
                $query->whereDate('date', '>=', $this->form['from_date']);
            }
            if (!empty($this->form['to_date'])) {
                $query->whereDate('date', '<=', $this->form['to_date']);
            }
            if (!empty($this->form['branch_id'])) {
                $query->whereIn('branch_id', $this->form['branch_id']);
            }
            if (!empty($this->form['task_category_id'])) {
                $query->whereIn('task_category_id', $this->form['task_category_id']);
            }
            if (!empty($this->form['task_division_id'])) {
                $query->whereIn('task_division_id', $this->form['task_division_id']);
            }

        })->orderByDesc('date')->get();

        return view('taskmanagement::livewire.task-report-livewire');
    }
}
