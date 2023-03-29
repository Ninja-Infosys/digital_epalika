<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;
use Modules\DigitalBoard\Entities\Video;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    public function __invoke()
    {
        $this->checkAuthorization('digitalBoardDashboard_access');

        $video_count = Video::count();
        $employee_count = Employee::count();
        $notice_count = Notice::whereType('Notice')->count();
        $news_count = Notice::whereType('News')->count();

        if (request()->ajax()) {
            return [
                'allNoticeAccordingMonth' => $this->getNoticeAccordingToMonth(),
                'allNoticeAccordingFY' => $this->getTotalNewsNoticeAccordingToFy()
            ];
        }

        return view('digitalboard::admin.dashboard', compact('employee_count', 'video_count', 'notice_count', 'news_count'));
    }

    public function getNoticeAccordingToMonth(): array
    {
        $totalCount = collect([0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0]);
        $noticeCount = collect([0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0]);
        $newsCount = collect([0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0]);

        Notice::where('fiscal_year_id', officeSetting()->fiscal_year_id)
            ->get()
            ->each(function ($notice) use($totalCount,$newsCount,$noticeCount) {
                $nepaliDate = explode('-', $notice->date);
                $totalCount[(int)$nepaliDate[1]-1] +=1;

                if ($notice->type == 'Notice'){
                    $noticeCount[(int)$nepaliDate[1]-1] +=1;
                }else{
                    $newsCount[(int)$nepaliDate[1]-1] +=1;
                }
          });

        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $totalCount,
                    'label' => 'जम्मा'
                ],
                [
                    'data' => $noticeCount,
                    'label' => 'सूचना'
                ],
                [
                    'data' => $newsCount,
                    'label' => 'समाचार'
                ],
            ],
        ];
    }

    public function getTotalNewsNoticeAccordingToFy(): array
    {
        $fiscalYears = FiscalYear::withCount([
            'notices',
            'notices as notice_count' => function ($query) {
                $query->where('type', 'Notice');
            }, 'notices as news_count' => function ($query) {
                $query->where('type', 'News');
            },])->get();

        return [
            'labels' => $fiscalYears->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYears->pluck('notice_count')->toArray(),
                    'label' => 'सूचना',
                    'fill' => 'false',
                ],
                [
                    'data' => $fiscalYears->pluck('news_count')->toArray(),
                    'label' => 'समाचार',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
