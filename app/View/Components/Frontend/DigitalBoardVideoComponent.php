<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Video;

class DigitalBoardVideoComponent extends Component
{
    public $videos;

    public function __construct(int|null $ward = null)
    {
        $dbVideos = Video::latest()
            ->where(function ($q) use ($ward) {
                if (!empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->get()
            ->pluck('video');

        $this->videos = extractBulkYouTubeVideoId($dbVideos);


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.digital-board-video-component');
    }
}

