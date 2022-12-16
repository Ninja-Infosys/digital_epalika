<?php

namespace Modules\Circular\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Carbon;
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

        $registrationChartData = $this->getTotalRegistrationAndDispatchData();

        $registrationYearlyChartData = $this->getCurrentFyMonthlyRegistrationAndDispatch($officeSetting);

        return view(
            'circular::admin.dashboard',
            compact(
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

    /**
     * @return array
     */
    public function getTotalRegistrationAndDispatchData(): array
    {
        $fiscalYears = FiscalYear::withCount(['registrations', 'dispatch'])->get();

        return [
            'labels' => $fiscalYears->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYears->pluck('registrations_count')->toArray(),
                    'label' => 'दर्ता',
                    'fill' => 'false',
                ],
                [
                    'data' => $fiscalYears->pluck('dispatch_count')->toArray(),
                    'label' => 'चलानी',
                    'fill' => 'false',
                ],
            ],
        ];
    }

    /**
     * @param OfficeSetting $officeSetting
     * @return array
     */
    public function getCurrentFyMonthlyRegistrationAndDispatch(OfficeSetting $officeSetting): array
    {
        $monthlyRegistrations = [];
        $registrations = Registration::where('fiscal_year_id', $officeSetting->fiscal_year_id)
            ->get()
            ->map(function ($registration) {
                return [
                    'month' => explode('-', $registration->registration_date)[1] ?? ''
                ];
            });

        foreach ($this->month_name as $key => $month) {
            $monthlyRegistrations[] = $registrations->where('month', ($key + 1))->count();
        }

        $monthlyDispatches = [];
        $dispatches=Dispatch::where('fiscal_year_id', $officeSetting->fiscal_year_id)
            ->get()
            ->map(function ($dispatch){
                return [
                    'month' => explode('-', $dispatch->dispatch_date)[1] ?? ''
                ];
            });

        foreach ($this->month_name as $key => $month) {
            $monthlyDispatches[] = $dispatches->where('month', ($key + 1))->count();;
        }

        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $monthlyRegistrations,
                    'label' => 'दर्ता',
                    'fill' => 'false',
                ],
                [
                    'data' => $monthlyDispatches,
                    'label' => 'चलानी',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
