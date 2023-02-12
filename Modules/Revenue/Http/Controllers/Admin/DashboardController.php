<?php

namespace Modules\Revenue\Http\Controllers\Admin;

use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Revenue\Entities\Invoice;
use Modules\Revenue\Entities\TaxPayer;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    public function __invoke()
    {
        $fiscal_year_id = officeSetting()->fiscal_year_id;

        $taxPayerCount = DB::table('tax_payers')
            ->whereNull('deleted_at')
            ->where('is_active', true)
            ->count();

        $invoiceCount = DB::table('invoices')
            ->where('fiscal_year_id', $fiscal_year_id)
            ->whereNull('deleted_at')
            ->count();

        $results = DB::table('invoices')
            ->selectRaw('invoices.payment_date,invoices.payment_date_en,invoices.fiscal_year_id, SUM((invoice_particulars.rate * invoice_particulars.quantity) + invoice_particulars.fine) as total')
            ->join('invoice_particulars', 'invoice_particulars.invoice_id', '=', 'invoices.id')
            ->whereNull('invoices.deleted_at')
            ->whereNull('invoice_particulars.deleted_at')
            ->groupBy('invoices.fiscal_year_id', 'invoices.payment_date', 'invoices.payment_date_en')
            ->get();

        $all_total = $results->sum('total');
        $fiscal_year_total = $results->where('fiscal_year_id', $fiscal_year_id)->sum('total');
        $today_total = $results->where('payment_date_en', today())->sum('total');
        $nepaliMonth = $this->get_nepali_date(date('Y'), date('m'), date('d'));
        $this_month_total = $results->filter(function ($item) use ($nepaliMonth) {
            return date('m', strtotime($item->payment_date)) == $nepaliMonth['m'];
        })->sum('total');
        $previous_month_total = $results->filter(function ($item) use ($nepaliMonth) {
            return date('m', strtotime($item->payment_date)) == $nepaliMonth['m'] - 1;
        })->sum('total');

        return view('revenue::admin.dashboard', compact('taxPayerCount', 'invoiceCount', 'all_total', 'fiscal_year_total', 'today_total', 'this_month_total', 'previous_month_total'));
    }
}
