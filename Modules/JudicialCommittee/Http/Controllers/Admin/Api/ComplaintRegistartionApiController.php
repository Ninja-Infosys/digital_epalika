<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintRegistartionApiController extends Controller
{
    public function index()
    {
        return view('judicialcommittee::index');
    }

    public function create()
    {
        return view('judicialcommittee::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('judicialcommittee::show');
    }

    public function edit($id)
    {
        return view('judicialcommittee::edit');
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
