<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    public function index()
    {
        $this->checkAuthorization('estimateDashboard_access');

        return view('estimate::admin.dashboard');
    }

    public function create()
    {
        return view('estimate::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('estimate::show');
    }

    public function edit($id)
    {
        return view('estimate::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
