<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateInputComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public function __construct(
        public string $name_ne = 'date_ne',
        public string  $label_ne = "मिति",
        public string  $name_en = "date_en",
        public string  $label_en = "Date",
        public mixed  $edit_date_ne = null,
        public mixed  $edit_date_en = null,
        public bool   $show_english_date = false,
        public bool   $get_today_date = true,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.date-input-component');
    }
}
