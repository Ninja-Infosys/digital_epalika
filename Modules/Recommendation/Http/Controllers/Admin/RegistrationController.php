<?php

namespace Modules\Recommendation\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RegistrationDetail;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = RegistrationDetail::all();
        return view('recommendation::admin.registration.index', compact('registrations'));
    }

    public function create()
    {
        return view('recommendation::admin.registration.create');
    }

    public function store(Request $request)
    {
        RegistrationDetail::create($request->validated());
       toast('दर्ता सफलतापूर्वक गरियो','success');
       return redirect()->route('admin.recommendation.registration.index');
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
