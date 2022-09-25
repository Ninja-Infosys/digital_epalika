<?php

namespace Modules\BusinessRegistration\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('businessregistration::index');
    }

    public function create()
    {
        return view('businessregistration::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('businessregistration::show');
    }

    public function edit($id)
    {
        return view('businessregistration::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function businessRegistration()
    {
        return view('businessregistration::frontend.index');
    }
}
