<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Http\Requests\BudgetSource\StoreBudgetSourceRequest;
use Modules\Plan\Http\Requests\BudgetSource\UdpateBudgetSourceRequest;

class BudgetSourceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('budgetSource_access'),
        403,
        'you are not able to access this resource');

        $budgetSources=BudgetSource::all();
        return view('plan::admin.setting.budget_source.index', compact('budgetSources'));
    }

    public function create()
    {
        abort_if(Gate::denies('budgetSource_create'),
            403,
            'you are not able to access this resource');

        return view('plan::admin.setting.budget_source.create');
    }

    public function store(StoreBudgetSourceRequest $request)
    {
        abort_if(Gate::denies('budgetSource_create'),
            403,
            'you are not able to access this resource');

        BudgetSource::create($request->validated());

        toast('बजेट स्रोत सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(BudgetSource $budgetSource)
    {
        abort_if(Gate::denies('budgetSource_edit'),
            403,
            'you are not able to access this resource');

        return view('plan::admin.setting.budget_source.edit',compact('budgetSource'));
    }

    public function update(UdpateBudgetSourceRequest $request, BudgetSource $budgetSource)
    {
        abort_if(Gate::denies('budgetSource_edit'),
            403,
            'you are not able to access this resource');

        $budgetSource->update($request->validated());

        toast('बजेट स्रोत सफलतापूर्वक सम्पादन गरियो', 'success');
        return redirect(route('admin.plan.budgetSource.index'));
    }

    public function destroy(BudgetSource $budgetSource)
    {
        abort_if(Gate::denies('budgetSource_delete'),
            403,
            'you are not able to access this resource');

        $budgetSource->delete();

        toast('बजेट स्रोत सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
