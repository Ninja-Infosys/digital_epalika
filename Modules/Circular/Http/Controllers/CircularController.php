<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CircularController extends Controller
{
    public function index()
    {
        return view('circular::index');
    }

    public function create()
    {
        return view('circular::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('circular::show');
    }

    public function edit($id)
    {
        return view('circular::edit');
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
