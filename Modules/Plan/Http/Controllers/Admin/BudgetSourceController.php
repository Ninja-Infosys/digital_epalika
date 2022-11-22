<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\BudgetSource;

class BudgetSourceController extends Controller
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

    public function edit(BudgetSource $budgetSource)
    {
        return view('plan::edit');
    }

    public function update(Request $request, BudgetSource $budgetSource)
    {
        //
    }

    public function destroy(BudgetSource $budgetSource)
    {
        //
    }
}
