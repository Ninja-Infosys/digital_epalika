<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\Project;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();

        return view('plan::admin.report.index',compact('fiscalYears','columnData'));
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Project())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Project')
                    || array_keys($column, 'projectCostDetail');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }
}
