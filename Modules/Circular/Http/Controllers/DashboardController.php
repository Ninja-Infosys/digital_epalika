<?php

namespace Modules\Circular\Http\Controllers;

use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('circular::admin.dashboard', compact(
                'total_registrations',
                'yearly_registrations',
                'monthly_registrations',
                'total_dispatches',
                'yearly_dispatches',
                'monthly_dispatches'
            )
        );
    }
}
