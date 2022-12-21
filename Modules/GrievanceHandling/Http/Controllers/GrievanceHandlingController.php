<?php

namespace Modules\GrievanceHandling\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrievanceHandlingController extends Controller
{
    public function index()
    {
        return view('grievancehandling::index');
    }

    public function create()
    {
        return view('grievancehandling::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('grievancehandling::show');
    }

    public function edit($id)
    {
        return view('grievancehandling::edit');
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
