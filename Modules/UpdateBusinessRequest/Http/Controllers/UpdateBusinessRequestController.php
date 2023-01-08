<?php

namespace Modules\UpdateBusinessRequest\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateBusinessRequestController extends Controller
{
    public function index()
    {
        return view('updatebusinessrequest::index');
    }

    public function create()
    {
        return view('updatebusinessrequest::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('updatebusinessrequest::show');
    }

    public function edit($id)
    {
        return view('updatebusinessrequest::edit');
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
