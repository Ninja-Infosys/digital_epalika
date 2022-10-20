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
        $video_count = Video::count();
        $employee_count = Employee::count();
        $notice_count = Notice::whereType('Notice')->count();
        $news_count = Notice::whereType('News')->count();

        $noticeFyChartData = $this->getNoticeAccordingToFy();

        $totalNewsAndNoticeChartData = $this->getTotalNewsNoticeAccordingToFy();


        return view('digitalboard::admin.dashboard', compact('employee_count', 'video_count', 'notice_count', 'news_count', 'noticeFyChartData', 'totalNewsAndNoticeChartData'));
    }

    public function getNoticeAccordingToFy(): array
    {
        $officeSetting = OfficeSetting::first();
        $monthlyNotices = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyNotices[] = Notice::where('fiscal_year_id', $officeSetting->fiscal_year_id)
                ->where('type', 'Notice')
                ->whereMonth('date', $i)
                ->count();
        }

        $MonthlyNews = [];
        for ($i = 1; $i <= 12; $i++) {
            $MonthlyNews[] = Notice::where('fiscal_year_id', $officeSetting->fiscal_year_id)
                ->where('type', 'News')
                ->whereMonth('date', $i)
                ->count();
        }

        return [
            "labels" => $this->month_name,
            "dataSets" => [
                [
                    'data' => $monthlyNotices,
                    "label" => "सूचना",
                    "fill" => "false"
                ],
                [
                    'data' => $MonthlyNews,
                    "label" => "समाचार",
                    "fill" => "false"
                ]
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
            }])->get();


        return [
            "labels" => $fiscalYears->pluck('title')->toArray(),
            "dataSets" => [
                [
                    'data' => $fiscalYears->pluck('notice_count')->toArray(),
                    "label" => "सूचना",
                    "fill" => "false"
                ],
                [
                    'data' => $fiscalYears->pluck('news_count')->toArray(),
                    "label" => "समाचार",
                    "fill" => "false"
                ]
            ],
        ];
    }
}
