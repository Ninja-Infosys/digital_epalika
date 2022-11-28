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
        $this->checkAuthorization('budgetHead_access');

        $budgetHeads = BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();

        return view('plan::admin.setting.budget_head.index', compact('budgetHeads'));
    }

    public function create()
    {
        $this->checkAuthorization('budgetHead_create');

        $mainBudgetHeads = BudgetHead::whereNull('budget_head_id')->get();

        return view('plan::admin.setting.budget_head.create', compact('mainBudgetHeads'));
    }

    public function store(StoreBudgetHeadRequest $request)
    {
        $this->checkAuthorization('budgetHead_create');
        BudgetHead::create($request->validated());

        toast('बजेट शिर्षक सफलतापूर्वक थपियो ', 'success');
        return back();
    }

    public function edit(BudgetHead $budgetHead)
    {
        $this->checkAuthorization('budgetHead_edit');

        $mainBudgetHeads = BudgetHead::whereNull('budget_head_id')->get();

        return view('plan::admin.setting.budget_head.edit', compact('budgetHead', 'mainBudgetHeads'));
    }

    public function update(UpdateBudgetHeadRequest $request, BudgetHead $budgetHead)
    {
        $this->checkAuthorization('budgetHead_edit');

        $budgetHead->update($request->validated());

        toast('बजेट शिर्षक सफलतापूर्वक सम्पादन गरियो', 'success');
        return redirect(route('admin.plan.budgetHead.index'));
    }

    public function destroy(BudgetHead $budgetHead)
    {
        $this->checkAuthorization('budgetHead_delete');
        $budgetHead->budgetHeads()->delete();
        $budgetHead->delete();

        toast('बजेट शिर्षक सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
