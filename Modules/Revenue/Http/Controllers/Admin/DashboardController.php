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

        $results = DB::table('invoices')
            ->selectRaw('invoices.fiscal_year_id, SUM((invoice_particulars.rate * invoice_particulars.quantity) + invoice_particulars.fine) as total')
            ->join('invoice_particulars', 'invoice_particulars.invoice_id', '=', 'invoices.id')
            ->whereNull('invoices.deleted_at')
            ->whereNull('invoice_particulars.deleted_at')
            ->groupBy('invoices.fiscal_year_id')
            ->get();

        $all_total = $results->sum('total');
        $fiscal_year_total = $results->where('fiscal_year_id', officeSetting()->fiscal_year_id)->first()->total;


        return view('revenue::admin.dashboard', compact('taxPayerCount', 'invoiceCount', 'all_total', 'fiscal_year_total'));
    }
}
