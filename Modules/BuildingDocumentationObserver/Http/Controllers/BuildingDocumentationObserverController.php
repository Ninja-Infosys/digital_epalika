<?php

namespace Modules\BuildingDocumentationObserver\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildingDocumentationObserverController extends Controller
{
    public function index()
    {
        return view('buildingdocumentationobserver::index');
    }

    public function create()
    {
        return view('buildingdocumentationobserver::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('buildingdocumentationobserver::show');
    }

    public function edit($id)
    {
        return view('buildingdocumentationobserver::edit');
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
