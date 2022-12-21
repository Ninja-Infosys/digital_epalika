<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfficeHeader extends Component
{
    public $officeHeaders = [];

    public $title;

    public $font_color;

    public $font_size;

    public $position;

    public $font;

    public function mount()
    {
    }

    protected $rules = [

        'officeHeaders.*.title' => ['required', 'string', 'max:255'],
        'officeHeaders.*.font_color' => ['nullable'],
        'officeHeaders.*.font_size' => ['required', 'max:255'],
        'officeHeaders.*.position' => ['nullable', 'integer'],
        'officeHeaders.*.font' => ['required'],

    ];

    public function addOfficeHeader()
    {
        $this->officeHeaders[] = [];
    }

    public function removeOfficeHeader($index)
    {
        if (array_key_exists('id', $this->officeHeaders[$index])) {
            \App\Models\OfficeHeader::find($this->officeHeaders[$index]['id'])->delete();
        }
        unset($this->officeHeaders[$index]);
        $this->officeHeaders = array_values($this->officeHeaders);
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            foreach ($this->officeHeaders as $officeHeader) {
                \App\Models\OfficeHeader::create($officeHeader);
            }
        });

        return redirect(route('admin.officeSetting.index'));
    }

    public function render()
    {
        return view('livewire.office-header');
    }
}
