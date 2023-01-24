<?php

namespace Modules\Plan\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\ExpenseHead;

class ExpenseHeadController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('expenseHead_access');

        $expenseHeads = ExpenseHead::all();
        return view('plan::admin.setting.expense_head.index', compact('expenseHeads'));
    }

    public function create()
    {
        $this->checkAuthorization('expenseHead_create');
        return view('plan::admin.setting.expense_head.create');
    }

    public function store(Request $request, ExpenseHead $expenseHead)
    {
        $this->checkAuthorization('expenseHead_create');

        ExpenseHead::create($request->validate(
            ['title' => ['required', 'string']],
            ['title.required' => 'खर्च शीर्षक आवसेक छ']
        ));

        toast('खर्च शीर्षक सफलतापूर्वक थपियो', 'success');
        return redirect()->route('admin.plan.expenseHead.index');
    }

    public function edit(ExpenseHead $expenseHead)
    {
        $this->checkAuthorization('expenseHead_edit');
        return view('plan::admin.setting.expense_head.edit', compact('expenseHead'));
    }

    public function update(Request $request, ExpenseHead $expenseHead)
    {
        $this->checkAuthorization('expenseHead_edit');

        $expenseHead->update($request->validate(
            ['title' => ['required', 'string']],
            ['title.required' => 'खर्च शीर्षक आवसेक छ']
        ));

        toast('खर्च शीर्षक सफलतापूर्वक सम्पादन गरियो', 'success');
        return redirect()->route('admin.plan.expenseHead.index');
    }

    public function destroy(ExpenseHead $expenseHead)
    {
        $this->checkAuthorization('expenseHead_delete');
        $expenseHead->delete();
        toast('खर्च शीर्षक सफलतापूर्वक हटाइयो', 'success');
        return redirect()->route('admin.plan.expenseHead.index');
    }
}
