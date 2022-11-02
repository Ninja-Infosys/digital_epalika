<?php

namespace Modules\Request\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {
        return view('request::index');
    }

    public function create()
    {
        return view('request::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('request::show');
    }

    public function edit($id)
    {
        return view('request::edit');
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
