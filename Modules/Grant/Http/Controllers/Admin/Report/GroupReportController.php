<?php

namespace Modules\Grant\Http\Controllers\Admin\Report;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Grant\Entities\Group;

class GroupReportController extends Controller
{
    public function index()
    {
        $columnData = $this->getColumns();

        return view('grant::admin.report.group.index',compact('columnData'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'columns' => ['nullable', 'array']
        ]);

        $groups = Group::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        return response()->json([
            'view' => (string)View::make('grant::admin.report.group.table_data', compact('groups'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Group())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Group');
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
