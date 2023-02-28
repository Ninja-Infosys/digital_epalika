<?php

namespace Modules\Revenue\Http\Controllers;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::all();
        return view('revenue::admin.report.index',compact('fiscalYears'));
    }

}
