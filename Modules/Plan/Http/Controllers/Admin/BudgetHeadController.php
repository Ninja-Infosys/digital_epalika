<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Http\Requests\BudgetHead\StoreBudgetHeadRequest;
use Modules\Plan\Http\Requests\BudgetHead\UpdateBudgetHeadRequest;

class BudgetHeadController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('budgetHead_access'),
        403,
        'you are not able to access this resource');

        $budgetHeads=BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();
        return view('plan::admin.setting.budget_head.index', compact('budgetHeads'));
    }

    public function create()
    {
        abort_if(Gate::denies('budgetHead_create'),
            403,
            'you are not able to access this resource');

        $mainBudgetHeads=BudgetHead::whereNull('budget_head_id')->get();
        return view('plan::admin.setting.budget_head.create',compact('mainBudgetHeads'));
    }

    public function store(StoreBudgetHeadRequest $request)
    {
        abort_if(Gate::denies('budgetHead_create'),
            403,
            'you are not able to access this resource');

        BudgetHead::create($request->validated());

        toast('Budget Head Added Successfully ', 'success');
        return back();
    }

    public function edit(BudgetHead $budgetHead)
    {
        abort_if(Gate::denies('budgetHead_edit'),
            403,
            'you are not able to access this resource');

        $mainBudgetHeads=BudgetHead::whereNull('budget_head_id')->get();
        return view('plan::admin.setting.budget_head.edit',compact('budgetHead','mainBudgetHeads'));
    }

    public function update(UpdateBudgetHeadRequest $request, BudgetHead $budgetHead)
    {
        abort_if(Gate::denies('budgetHead_edit'),
            403,
            'you are not able to access this resource');

        $budgetHead->update($request->validated());

        toast('Budget Head Updated Successfully', 'success');
        return redirect(route('admin.plan.budgetHead.index'));
    }

    public function destroy(BudgetHead $budgetHead)
    {
        abort_if(Gate::denies('budgetHead_delete'),
            403,
            'you are not able to access this resource');
        $budgetHead->budgetHeads()->delete();
        $budgetHead->delete();

        toast('Budget Head Deleted Successfully', 'success');
        return back();
    }
}
