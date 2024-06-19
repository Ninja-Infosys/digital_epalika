<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Video;

class DigitalBoardVideoComponent extends Component
{
    public $videos;

    public function __construct(?int $ward = null)
    {
        // Fetch videos from database
        $dbVideos = Video::latest()
            ->where('status', 1)
            ->where(function ($q) use ($ward) {
                if (!empty($ward)) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                } else {
                    $q->MainPageDisplay();
                }
            })
            ->pluck('video'); // Assuming 'video' is the attribute containing the YouTube video URLs

        // Extract YouTube video IDs from filtered videos
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

