<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DigitalBoardController extends Controller
{
    public function index()
    {
        return view('digitalboard::index');
    }

    public function create()
    {
        return view('digitalboard::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('digitalboard::show');
    }

    public function edit($id)
    {
        return view('digitalboard::edit');
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
