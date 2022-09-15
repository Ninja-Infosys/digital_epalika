<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Circular\Entities\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );

        $registrations = Registration::latest()->get();

        return view('circular::registration.index', compact('registrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );

        return view('circular::registration.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );
    }

    public function show(Registration $registration)
    {
        abort_if(Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );

        return view('circular::registration.show');
    }

    public function edit(Registration $registration)
    {
        abort_if(Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );

        return view('circular::registration.edit');
    }

    public function update(Request $request, Registration $registration)
    {
        abort_if(Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );
    }

    public function destroy(Registration $registration)
    {
        abort_if(Gate::denies('registration_delete'),
            403,
            'You are not allowed to registration delete'
        );
    }
}
