<?php

namespace Modules\Revenue\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Revenue\Entities\TaxPayer;
use Modules\Revenue\Entities\TaxPayerType;
use Modules\Revenue\Http\Requests\TaxPayer\StoreTaxPayerRequest;
use Modules\Revenue\Http\Requests\TaxPayer\UpdateTaxPayerRequest;

class TaxPayerController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('taxPayer_access');

        $taxPayers = TaxPayer::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['tax_payer_type_id', 'fiscal_year_id', 'registration_no', 'name', 'name_en', 'phone', 'email', 'father_name', 'grandfather_name', 'citizenship_no', 'ward',], request('search'));
            }
        })->latest()->paginate(1);
        return view('revenue::admin.tax-payer.index', compact('taxPayers'));
    }

    public function create()
    {
        $this->checkAuthorization('taxPayer_create');
        $taxPayerTypes = TaxPayerType::all();
        return view('revenue::admin.tax-payer.create', compact('taxPayerTypes'));
    }

    public function store(StoreTaxPayerRequest $request)
    {
        $this->checkAuthorization('taxPayer_create');

        TaxPayer::create($request->validated());
        toast('करदाता सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(TaxPayer $taxPayer)
    {
        $this->checkAuthorization('taxPayer_access');

//        TODO: Alert Show Form For Tax Payer
        return view('revenue::show');
    }

    public function edit(TaxPayer $taxPayer)
    {
        $this->checkAuthorization('taxPayer_edit');
        $taxPayerTypes = TaxPayerType::all();
        return view('revenue::admin.tax-payer.edit', compact('taxPayer', 'taxPayerTypes'));
    }

    public function update(UpdateTaxPayerRequest $request, TaxPayer $taxPayer)
    {
        $this->checkAuthorization('taxPayer_edit');

        $taxPayer->update($request->validated());
        toast('करदाता सफलतापूर्वक अपडेट भयो', 'success');
        return redirect()->route('admin.revenue.taxPayer.index');
    }

    public function destroy(TaxPayer $taxPayer)
    {
        $this->checkAuthorization('taxPayer_delete');

        $taxPayer->delete();
        toast('करदाता सफलतापूर्वक हटाइयो', 'success');
        return redirect()->route('admin.revenue.taxPayer.index');
    }

    public function updateStatus(TaxPayer $taxPayer)
    {
        $this->checkAuthorization('revenue_edit');
        $taxPayer->update(['is_active' => !$taxPayer->is_active]);
        toast('करदाता स्थिति अपडेट गरियो', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->route('admin.revenue.taxPayer.index');
    }
}
