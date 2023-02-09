<?php

namespace Modules\Revenue\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Revenue\Entities\Invoice;
use Modules\Revenue\Entities\TaxPayer;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $taxPayerCount = TaxPayer::active()->count();

        $invoiceCount = Invoice::where('fiscal_year_id', officeSetting()->fiscal_year_id)->count();

        $revenue = Invoice::withSum(['invoiceParticulars' => function ($query) {
            $query->select(DB::raw('SUM((rate * quantity) + fine) as total'));
        }], 'total')
            ->get();


        return view('revenue::admin.dashboard', compact('taxPayerCount', 'invoiceCount', 'revenue'));
    }
}
