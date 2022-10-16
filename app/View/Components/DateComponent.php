<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public mixed $name_ne;
    public mixed $label_ne;
    public mixed $name_en;
    public mixed $label_en;
    public mixed $edit_date_ne = null;
    public mixed $edit_date_en = null;

    public function __construct($data)
    {
        info($data);
        $this->name_ne = $data['name_ne'] ?? null;
        $this->label_ne = $data['label_ne'] ?? null;
        $this->name_en = $data['name_en'] ?? null;
        $this->label_en = $data['label_en'] ?? null;
        $this->edit_date_ne = $data['edit_date_ne'] ?? null;
        $this->edit_date_en = $data['edit_date_en'] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.date-component');
    }
}
