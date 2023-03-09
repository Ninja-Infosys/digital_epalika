<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileView extends Component
{
    public function __construct(public $title= 'file', public $fileUrl= '', public $extension = '')
    {

    }

    public function render()
    {
        return view('components.file-view');
    }
}
