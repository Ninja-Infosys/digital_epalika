<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\Roaster\Entities\Subject;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {

        $organization_count = Organization::count();
        $map_apply_count = MapApply::count();

        $officeSetting = OfficeSetting::with('fiscalYear')->first();

        $mapAppliesAccordingToFiscalYears = $this->getMapApplyAccordingToFiscalYear($officeSetting);

        return view('emap::admin.dashboard', compact('organization_count','map_apply_count','mapAppliesAccordingToFiscalYears'));
    }


    public function getMapApplyAccordingToFiscalYear($officeSetting): array
    {
        $mapAppliesAccordingToFiscalYear = MapApply::with('organization')->where('fiscal_year_id', $officeSetting->fiscal_year_id)->get()->groupBy('fiscal_year_id');


        return [
            'labels' => $mapAppliesAccordingToFiscalYear->pluck('fiscal_year_id')->toArray(),
            'dataSets' => [
                [
                    'data' => $mapAppliesAccordingToFiscalYear->pluck('trainers_count')->toArray(),
                    'label' => 'जम्मा प्रशिक्षकहरू',
                    'fill' => 'false',
                ]
            ]
        ];
    }
}
