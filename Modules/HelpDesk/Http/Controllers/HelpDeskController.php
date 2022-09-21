<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpDeskController extends Controller
{
    public function index()
    {
        return view('helpdesk::index');
    }

    public function create()
    {
        return view('helpdesk::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('helpdesk::show');
    }

    public function edit($id)
    {
        return view('helpdesk::edit');
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
