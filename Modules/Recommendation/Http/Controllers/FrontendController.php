<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('grant::frontend.index');
    }
    // public function eMap()
    // {
    //     $necessaryDocuments = NecessaryDocument::with('files')->get();
    //     $registrationDocuments =RegistrationDocument::all();
    
    
    //     return view('emap::frontend.e-map.index', compact('necessaryDocuments','registrationDocuments'));
    // }

    public function create()
    {
        return view('recommendation::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('recommendation::show');
    }

    public function edit($id)
    {
        return view('recommendation::edit');
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
