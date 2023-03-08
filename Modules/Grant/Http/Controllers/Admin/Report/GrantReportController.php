<?php

namespace Modules\Grant\Http\Controllers\Admin\Report;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Grant;
use Modules\Grant\Entities\GrantDetail;
use Modules\Grant\Entities\GrantOffice;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Transformers\GrantResourceReport;

class GrantReportController extends Controller
{
    public function index(): Factory|\Illuminate\Contracts\View\View|Application
    {
        $columnData = $this->getColumns();
        $fiscalYears = FiscalYear::all();
        $grantTypes = GrantType::all();
        $grantPrograms = GrantProgram::all();
        $grantOffices = GrantOffice::all();
        return view('grant::admin.report.grant.index', compact('columnData','fiscalYears','grantTypes','grantPrograms','grantOffices'));
    }

    public function report(Request $request)
    {

        $request->validate([
            'columns' => ['nullable', 'array']
        ]);

        $grantDetails = GrantDetail::with('grant','localBody')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        return response()->json([
            'data' => GrantResourceReport::collection($grantDetails)
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new GrantDetail())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'GrantDetail');
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
        $q->whereHas('grant',function ($sub_q) use($request){
            if(!empty($request->input('fiscal_year_id'))){
                $sub_q->whereIn('fiscal_year_id',$request->input('fiscal_year_id'));
            }
            if(!empty($request->input('grant_type_id'))){
                $sub_q->whereIn('grant_type_id',$request->input('grant_type_id'));
            }
            if(!empty($request->input('grant_program_id'))){
                $sub_q->whereIn('grant_program_id',$request->input('grant_program_id'));
            }
            if(!empty($request->input('grant_office_id'))){
                $sub_q->whereIn('grant_office_id',$request->input('grant_office_id'));
            }
        });

        if(!empty($request->input('grant_for'))){
            $q->whereIn('grant_for', $request->input('grant_for'));
        }
        if(!empty($request->input('is_old'))){
            $q->whereIn('is_old', $request->input('is_old'));
        }
    }

}
