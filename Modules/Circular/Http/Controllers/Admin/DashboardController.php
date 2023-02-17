<?php

namespace Modules\Circular\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Collection;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Entities\Registration;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    protected Collection $currentYearRegistrations;
    protected Collection $currentYearDispatches;

    public function __construct()
    {
        parent::__construct();

        $this->currentYearRegistrations = Registration::where('fiscal_year_id', officeSetting()->fiscal_year_id)->get();
        $this->currentYearDispatches = Dispatch::where('fiscal_year_id', officeSetting()->fiscal_year_id)->get();
    }

    public function __invoke()
    {
        $nepali_date = $this->get_nepali_date(now()->format('Y'), now()->format('m'), now()->format('d'));

        $total_registrations = Registration::count();
        $monthly_registrations = $this->currentYearRegistrations->where('registration_month', $nepali_date['m'])->count();
        $total_dispatches = Dispatch::count();
        $monthly_dispatches = $this->currentYearDispatches->where('dispatch_month', $nepali_date['m'])->count();
        if (request()->ajax()) {
            return [
                'fyRegistrationAndDispatch' => $this->getFyRegistrationAndDispatchData(),
                'totalMonthRegistrationAndDispatch'=>$this->getCurrentFyRegistrationAndDispatch()
            ];
                }
        return view(
            'circular::admin.dashboard',
            compact(
                'total_registrations',
                'monthly_registrations',
                'total_dispatches',
                'monthly_dispatches'
            )
        );
    }

    /**
     * @return array
     */
    public function getFyRegistrationAndDispatchData(): array
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

    public function getCurrentFyRegistrationAndDispatch(): array
    {
        $monthlyRegistrations = [];
        $monthlyDispatches = [];

        foreach ($this->month_name as $key => $month) {
            $monthlyRegistrations[] = $this->currentYearRegistrations->where('registration_month', ($key + 1))->count();
            $monthlyDispatches[] = $this->currentYearDispatches->where('dispatch_month', ($key + 1))->count();
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
