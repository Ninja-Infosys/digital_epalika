<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Circular\Entities\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::latest()->get();

        return view('circular::registration.index', compact('registrations'));
    }

    public function create()
    {
        return view('circular::registration.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Registration $registration)
    {
        return view('circular::registration.show');
    }

    public function edit(Registration $registration)
    {
        return view('circular::registration.edit');
    }

    public function update(Request $request, Registration $registration)
    {
        //
    }

    public function destroy(Registration $registration)
    {
        //
    }
}
