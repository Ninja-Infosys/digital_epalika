<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Video;

class DigitalBoardVideoComponent extends Component
{
    public $videos;

    public function __construct(int|null $ward = null)
    {

        $this->videos = Video::latest()
        ->where(function ($q) use ($ward) {
            if (!empty($ward)) {
                $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
            } else {
                $q->MainPageDisplay();
            }
        })
        ->get();
    }

    public function render()
    {
        return view('components.frontend.digital-board-video-component');
    }
}
