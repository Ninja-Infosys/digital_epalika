<?php

namespace Modules\Identity\Http\Livewire;

use Livewire\Component;

class TaskLivewire extends Component
{
    public $tasks = [];

    public function mount($tasks = [])
    {
        $this->tasks = $tasks;
    }

    public function incrementTask()
    {
        $this->tasks[] = [];
    }

    public function decrementTask($index)
    {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }

    public function render()
    {
        return view('identity::livewire.task-livewire');
    }
}
