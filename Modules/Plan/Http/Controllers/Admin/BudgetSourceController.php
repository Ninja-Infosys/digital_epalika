<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Http\Requests\BudgetSource\StoreBudgetSourceRequest;
use Modules\Plan\Http\Requests\BudgetSource\UdpateBudgetSourceRequest;

class BudgetSourceController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('budgetSource_access');

        $budgetSources = BudgetSource::all();
        return view('plan::admin.setting.budget_source.index', compact('budgetSources'));
    }

    public function create()
    {
        $this->checkAuthorization('budgetSource_create');

        return view('plan::admin.setting.budget_source.create');
    }

    public function store(StoreBudgetSourceRequest $request)
    {
        $this->checkAuthorization('budgetSource_create');

        BudgetSource::create($request->validated());

        toast('बजेट स्रोत सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(BudgetSource $budgetSource)
    {
        $this->checkAuthorization('budgetSource_edit');

        return view('plan::admin.setting.budget_source.edit', compact('budgetSource'));
    }

    public function update(UdpateBudgetSourceRequest $request, BudgetSource $budgetSource)
    {
        $this->checkAuthorization('budgetSource_edit');

        $budgetSource->update($request->validated());

        toast('बजेट स्रोत सफलतापूर्वक सम्पादन गरियो', 'success');
        return redirect(route('admin.plan.budgetSource.index'));
    }

    public function destroy(BudgetSource $budgetSource)
    {
        $this->checkAuthorization('budgetSource_delete');


        $budgetSource->delete();

        toast('बजेट स्रोत सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
