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
            'cooperatives', 'groups', 'enterprises'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'columns' => ['nullable', 'array']
        ]);

        $farmers = Farmer::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        return response()->json([
            'view' => (string)View::make('grant::admin.report.farmer.table_data', compact('farmers'))
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
            $q->whereIn('ward_no', $request->input('ward_no'));
        }

        if (!empty($request->input('gender'))) {
            $q->where('gender', $request->input('gender'));
        }

        if (!empty($request->input('marital_status'))) {
            $q->where('marital_status', $request->input('marital_status'));
        }
    }
}
