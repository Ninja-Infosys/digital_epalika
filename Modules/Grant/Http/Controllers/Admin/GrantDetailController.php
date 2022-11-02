<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrantDetailController extends Controller
{
    public function index()
    {
        return view('grant::admin.grant_detail.index');
    }

    public function create()
    {
        return view('grant::admin.grant_detail.create');
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
