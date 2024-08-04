<?php

namespace Modules\EMap\Http\Controllers;

use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\LandDetail;
use Modules\EMap\Entities\MapApply;

class ReportController extends Controller
{
    public function getRequiredData()
    {
        $fiscalYears = FiscalYear::get();
        $length = $this->setLengthData();
        $breadth = $this->setBreadthData();
        $area_of_plinth = $this->setAreaofPlinthData();
        $current_storey = $this->setCurrentStoreyData();
        $future_storey = $this->setFutureStoreyData();
        return view('emap::admin.emapReport.index', compact('fiscalYears', 'length', 'breadth', 'area_of_plinth', 'current_storey', 'future_storey'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);


        $mapApplies = MapApply::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->get();

        return response()->json([
            'view' => (string)View::make('emap::admin.emapReport.report_table', compact('mapApplies'))
        ]);
    }


    public function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('construction_type'))) {
            $q->whereIn('construction_type', $request->input('construction_type'));
        }

        if (!empty($request->input('usage'))) {
            $q->whereIn('usage', $request->input('usage'));
        }

        if (!empty($request->input('building_category'))) {
            $q->whereIn('building_category', $request->input('building_category'));
        }

        if (!empty($request->input('application_type'))) {
            $q->whereIn('application_type', $request->input('application_type'));
        }

        if (!empty($request->input('current_storey.from'))) {
            $q->where('current_storey', '>=', (int)$request->input('current_storey.from'));
        }

        if (!empty($request->input('current_storey.to'))) {
            $q->where('current_storey', '<=', (int)$request->input('current_storey.to'));
        }

        if (!empty($request->input('future_storey.from'))) {
            $q->where('future_storey', '>=', (int)$request->input('future_storey.from'));
        }
        if (!empty($request->input('future_storey.to'))) {
            $q->where('future_storey', '<=', (int)$request->input('future_storey.to'));
        }

        if (!empty($request->input('area_of_plinth.from'))) {
            $q->where('area_of_plinth', '>=', (int)$request->input('area_of_plinth.from'));
        }
        if (!empty($request->input('area_of_plinth.to'))) {
            $q->where('area_of_plinth', '<=', (int)$request->input('area_of_plinth.to'));
        }

        if (!empty($request->input('length.from'))) {
            $q->where('length', '>=', (int)$request->input('length.from'));
        }
        if (!empty($request->input('length.to'))) {
            $q->where('length', '<=', (int)$request->input('length.to'));
        }

        if (!empty($request->input('breadth.from'))) {
            $q->where('breadth', '>=', (int)$request->input('breadth.from'));
        }
        if (!empty($request->input('breadth.to'))) {
            $q->where('breadth', '<=', (int)$request->input('breadth.to'));
        }
    }


    private function setLengthData(): array
    {
        return [
            'from' => 0,
            'to' => (int)MapApply::select('length')->max('length')
        ];
    }

    private function setBreadthData(): array
    {
        return [
            'from' => 0,
            'to' => (int)MapApply::select('breadth')->max('breadth')
        ];
    }

    private function setAreaofPlinthData(): array
    {
        return [
            'from' => 0,
            'to' => (int)MapApply::select('area_of_plinth')->max('area_of_plinth')
        ];
    }

    private function setCurrentStoreyData(): array
    {
        return [
            'from' => 0,
            'to' => (int)MapApply::select('current_storey')->max('current_storey')
        ];
    }

    private function setFutureStoreyData(): array
    {
        return [
            'from' => 0,
            'to' => (int)MapApply::select('future_storey')->max('future_storey')
        ];
    }

    public function getReportData()
    {
        $fiscalYears = FiscalYear::get();
        $landDetails = LandDetail::all();

        return view('emap::admin.emapReport.countReport', compact('fiscalYears', 'landDetails'));
    }

    public function countReport(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        $forms = Form::all();

        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;

        $query = MapApply::whereHas('landDetail', function ($q) use ($request) {
            if (!empty($request->input('ward_no'))) {
                $q->whereIn('ward_no', $request->input('ward_no'));
            }
        });

        $this->filterDataFromReport($query, $request);

        $generalCount = $query->count();

        $lastStepCount = 0;

        foreach ($forms as $form) {
            if ($form->order == $lastStep) {
                $lastStepCount = $query->whereHas('appliedDocuments', function ($query) use ($lastStep) {
                        $query->whereHas('form', function ($query) use ($lastStep) {
                            $query->where('order', $lastStep);
                        });
                    })->count();
                break;
            }


        }

        $mapApplies = $query->get();


        return response()->json([
            'view' => (string) View::make('emap::admin.emapReport.count_report_table', compact('mapApplies', 'generalCount', 'lastStepCount'))
        ]);
    }


    public function filterDataFromReport($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }
    }


}
