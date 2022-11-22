<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\PlanLevel;

class PlanLevelController extends Controller
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

    public function edit(PlanLevel $planLevel)
    {
        return view('plan::edit');
    }

    public function update(Request $request, PlanLevel $planLevel)
    {
        //
    }

    public function destroy(PlanLevel $planLevel)
    {
        //
    }
}
