<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Modules\DigitalBoard\Entities\Notice;

class ScrollNewsComponent extends Component
{
    public $scrollNews;

    public function __construct(?int $ward = null)
    {
        $this->scrollNews = Notice::where('type', 'News')
            ->whereNull('closed_at')
            ->where(function ($query) use ($ward) {
                $query->where(function ($q) use ($ward) {
                    $q->whereRaw("FIND_IN_SET('$ward', ward) > 0");
                })->orWhere(function ($q) {
                    $q->whereNull('ward');
                });
            })
            ->orWhere('is_displayed', true) // Include notices marked as displayed everywhere
            ->orderByDesc('date')
            ->get();
    }

    public function render()
    {
        return view('components.frontend.scroll-news-component');
    }
}
