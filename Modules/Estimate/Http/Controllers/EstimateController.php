<?php

namespace Modules\Estimate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstimateController extends Controller
{
    public function index()
    {
        return view('estimate::index');
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
