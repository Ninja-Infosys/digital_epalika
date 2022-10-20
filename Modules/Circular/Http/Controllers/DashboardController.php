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
//        dd($nepali_date);

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

        $monthlyRegistrations = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyRegistrations[] = Registration::where('fiscal_year_id', $officeSetting->fiscal_year_id)->whereMonth('registration_date', $i)->count();
        }

        $monthlyDispatches = [];

        foreach ($this->month_name as $key => $month) {
            $monthlyDispatches[] = Dispatch::where('fiscal_year_id', $officeSetting->fiscal_year_id)->whereMonth('dispatch_date', ($key + 1))->count();
        }

        $registrationYearlyChartData = [
            "labels" => $this->month_name,
            "dataSets" => [
                [
                    'data' => $monthlyRegistrations,
                    "label" => "दर्ता",
                    "fill" => "false"
                ],
                [
                    'data' => $monthlyDispatches,
                    "label" => "चलानी",
                    "fill" => "false"
                ]
            ],
        ];
        return view('circular::admin.dashboard', compact(
                'total_registrations',
                'yearly_registrations',
                'monthly_registrations',
                'total_dispatches',
                'yearly_dispatches',
                'monthly_dispatches',
                'registrationChartData',
                'registrationYearlyChartData'
            )
        );
    }
}
