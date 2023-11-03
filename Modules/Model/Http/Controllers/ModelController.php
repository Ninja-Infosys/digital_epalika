<?php

namespace Modules\Model\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    public function index()
    {
        return view('model::index');
    }

    public function create()
    {
        return view('model::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('model::show');
    }

    public function edit($id)
    {
        return view('model::edit');
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
