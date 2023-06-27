<?php

namespace Modules\TaskManagement\Http\Livewire;

use App\Models\Settings\Branch;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileTrackingLivewire extends Component
{
    use WithFileUploads;

    protected $listeners = ['dateChanged'];

    public Collection $branches;

    public array $form = [
        'registration_no' => null,
        'is_hardcopy' => 1,
        'remarks' => null,
        'fileActivity' => [
            'assigned_branch_id' => null,
            'date_bs' => null,
            'date_ad' => null,
            'remarks' => null
        ],
        'fileTrackingFiles' => []
    ];

    public function mount()
    {
        $this->branches = Branch::with('branches')->whereNull('branch_id')->get();
    }

    public function addFileTrackingFiles()
    {
        $this->form['fileTrackingFiles'][] = [];
    }

    public function removeFileTrackingFile($index)
    {
        unset($this->form['fileTrackingFiles']);
        $this->form['fileTrackingFiles'] = array_values($this->form['fileTrackingFiles']);
    }

    public function dateChanged($nepaliDate, $englishDate)
    {
        $this->form['fileActivity']['date_bs'] = $nepaliDate;
        $this->form['fileActivity']['date_ad'] = $englishDate;
    }

    protected $rules = [
        'form.registration_no' => ['nullable', 'unique:file_trackings,registration_no'],
        'form.is_hardcopy' => ['nullable', 'boolean'],
        'form.fileActivity.date_bs'=>['required'],
        'form.fileActivity.assigned_branch_id'=>['required','exists:branches,id'],
        'form.fileActivity.remarks'=>['nullable'],
        'form.fileTrackingFiles'=>['nullable','array'],
        'form.fileTrackingFiles.*.title'=>['nullable','string','max:255'],
        'form.fileTrackingFiles.*.description'=>['nullable','string'],
        'form.fileTrackingFiles.*.description'=>['nullable','string'],
        'form.fileTrackingFiles.*.files'=>['nullable','array'],
        'form.fileTrackingFiles.*.files.*'=>['mimes:jpg,jpeg,png'],
        'form.remarks' => ['nullable'],

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveFormData()
    {
        $this->validate();
        dd($this->form);
    }

    public function render()
    {
        return view('taskmanagement::livewire.file-tracking-livewire');
    }
}
