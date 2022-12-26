<?php

namespace Modules\Grant\Http\Controllers\Admin\Report;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Grant;

class GrantReportController extends Controller
{
    public function index()
    {
        return view('grant::admin.report.grant.index');
    }


    public function report(Request $request)
    {
        $request->validate([
            'columns' => ['nullable', 'array']
        ]);

        $grant = Grant::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        return response()->json([
            'view' => (string)View::make('grant::admin.report.grant.table_data', compact('grant'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Grant())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Grant');
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
    }

}
