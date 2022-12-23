<?php

namespace Modules\Grant\Http\Controllers\Admin\Report;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Grant\Entities\Cooperative;
use Modules\Grant\Entities\Enterprise;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Group;

class FarmerReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();
        $cooperatives = Cooperative::latest()->get();
        $groups = Group::latest()->get();
        $enterprises = Enterprise::latest()->get();
        return view('grant::admin.report.farmer.index', compact('fiscalYears', 'columnData',
        'cooperatives','groups','enterprises'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        $farmers = Farmer::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        return response()->json([
            'view' => (string)View::make('listregistration::admin.report.table_data', compact('farmers'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Farmer())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Farmer');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    public function filterDataFromUser($q, Request $request): void
    {

        if (!empty($request->input('ward_no'))) {
            $q->whereDate('date', '>=', $request->input('ward_no'));
        }

        if (!empty($request->input('martial_status'))) {
            $q->whereDate('date', '<=', $request->input('martial_status'));
        }

        if (!empty($request->input('citizenship_no'))) {
            $q->where('registration_no', $request->input('citizenship_no'));
        }

        if (!empty($request->input('applicant_type'))) {
            $q->whereIn('applicant_type', $request->input('applicant_type'));
        }

        if (!empty($request->input('business_nature'))) {
            $q->whereIn('business_nature', $request->input('business_nature'));
        }
    }
}
