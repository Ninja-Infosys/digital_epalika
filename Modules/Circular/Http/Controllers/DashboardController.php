<?php

namespace Modules\Circular\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    public function __invoke()
    {
        $nepali_date = $this->get_nepali_date(now()->format('Y'), now()->format('m'), now()->format('d'));

        $officeSetting = OfficeSetting::first();
        $total_registrations = Registration::count();
        $yearly_registrations = Registration::where('fiscal_year_id', $officeSetting->fiscal_year_id)->count();
        $monthly_registrations = Registration::where('fiscal_year_id', $officeSetting->fiscal_year_id)->whereMonth('registration_date', $nepali_date['m'])->count();
        $total_dispatches = Dispatch::count();
        $yearly_dispatches = Dispatch::where('fiscal_year_id', $officeSetting->fiscal_year_id)->count();
        $monthly_dispatches = Dispatch::where('fiscal_year_id', $officeSetting->fiscal_year_id)->whereMonth('dispatch_date', $nepali_date['m'])->count();


        $fiscalYears = FiscalYear::withCount(['registrations', 'dispatch'])->get();


        $registrationChartData = [
            "labels" => $fiscalYears->pluck('title')->toArray(),
            "dataSets" => [
                [
                    'data' => $fiscalYears->pluck('registrations_count')->toArray(),
                    "label" => "दर्ता",
                    "fill" => "false"
                ],
                [
                    'data' => $fiscalYears->pluck('dispatch_count')->toArray(),
                    "label" => "चलानी",
                    "fill" => "false"
                ]
            ],
        ];
        $registrationTotalData = Registration::where('fiscal_year_id', $officeSetting->fiscal_year_id)->query();

        $regData = [];

        foreach ($this->month_name as $key=>$month){
            $regData[] = $registrationTotalData->whereMonth('registration_date',$key+1)->count();
        }
        $registrationDataAccordingToMonth = [
            "labels" => $this->month_name,
            "dataSets"=>[
                [
                    'data' => $fiscalYears->pluck('registrations_count')->toArray(),
                    "label" => "दर्ता",
                    "fill" => "false"
                ]
            ]
        ];

        return view('circular::admin.dashboard', compact(
                'total_registrations',
                'yearly_registrations',
                'monthly_registrations',
                'total_dispatches',
                'yearly_dispatches',
                'monthly_dispatches',
                'registrationChartData'
            )
        );
    }
}
