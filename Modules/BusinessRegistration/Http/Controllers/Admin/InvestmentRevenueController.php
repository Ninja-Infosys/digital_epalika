<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Http\Requests\InvestmentRevenue\StoreInvestmentRevenueRequest;
use Modules\BusinessRegistration\Http\Requests\InvestmentRevenue\UpdateInvestmentRevenueRequest;

class InvestmentRevenueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('investmentRevenue_access'),
            403,
            'You are not allowed to digital board news access'
        );
        $investmentRevenues = InvestmentRevenue::with('objectTransaction')->get();

        return view('businessregistration::admin.setting.investment-revenues.index', compact('investmentRevenues'));
    }

    public function create()
    {
        abort_if(Gate::denies('investmentRevenue_create'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();

        return view('businessregistration::admin.setting.investment-revenues.create', compact('objectTransactions'));
    }

    public function store(StoreInvestmentRevenueRequest $request): RedirectResponse
    {
        abort_if(Gate::denies('investmentRevenue_create'),
            403,
            'You are not allowed to digital board news access'
        );

        InvestmentRevenue::create($request->validated());

        toast(' पुँजीगत लगानी र राजस्वो  सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(InvestmentRevenue $investmentRevenue)
    {
        abort_if(Gate::denies('investmentRevenue_access'),
            403,
            'You are not allowed to digital board news access'
        );

        return view('businessregistration::show');
    }

    public function edit(InvestmentRevenue $investmentRevenue)
    {
        abort_if(Gate::denies('investmentRevenue_edit'),
            403,
            'You are not allowed to digital board news access'
        );

        $objectTransactions = ObjectTransaction::with('objectTransactions')->whereNull('object_transaction_id')->get();

        return view('businessregistration::admin.setting.investment-revenues.edit', compact('objectTransactions', 'investmentRevenue'));
    }

    public function update(UpdateInvestmentRevenueRequest $request, InvestmentRevenue $investmentRevenue): RedirectResponse
    {
        abort_if(Gate::denies('investmentRevenue_edit'),
            403,
            'You are not allowed to digital board news access'
        );

        $investmentRevenue->update($request->validated());

        toast(' पुँजीगत लगानी र राजस्वो  अद्यावधिक गरियो', 'success');

        return back();
    }

    public function destroy(InvestmentRevenue $investmentRevenue): RedirectResponse
    {
        abort_if(Gate::denies('investmentRevenue_delete'),
            403,
            'You are not allowed to digital board news access'
        );

        $investmentRevenue->delete();

        toast(' पुँजीगत लगानी र राजस्वो  हटाइयो', 'success');

        return back();
    }
}
