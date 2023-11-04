<?php

namespace Modules\Models\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelsController extends Controller
{
    public function index()
    {
        return view('models::index');
    }

    public function create()
    {
        return view('models::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('models::show');
    }

    public function edit($id)
    {
        return view('models::edit');
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
