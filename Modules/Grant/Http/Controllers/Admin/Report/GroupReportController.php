<?php

namespace Modules\Grant\Http\Controllers\Admin\Report;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupReportController extends Controller
{
    public function index()
    {
        return view('grant::admin.report.group.index');
    }

    public function create()
    {
        return view('grant::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit($id)
    {
        return view('grant::edit');
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
