<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\BudgetHead;

class BudgetHeadController extends Controller
{
    public function index()
    {
        return view('plan::index');
    }

    public function create()
    {
        return view('plan::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(BudgetHead $budgetHead)
    {
        return view('plan::edit');
    }

    public function update(Request $request, BudgetHead $budgetHead)
    {
        //
    }

    public function destroy(BudgetHead $budgetHead)
    {
        //
    }
}
