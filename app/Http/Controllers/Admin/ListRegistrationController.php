<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListRegistrationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listRegistration_access'),
            403,
            'You are not allowed to list registration access'
        );

        $listRegistrations = ListRegistration::latest()->get();

        return view('admin.list_registration.index', compact('listRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('listRegistration_create'),
            403,
            'You are not allowed to list registration create'
        );

        return view('admin.list_registration.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('listRegistration_create'),
            403,
            'You are not allowed to list registration create'
        );
    }

    public function show(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_access'),
            403,
            'You are not allowed to list registration access'
        );
    }

    public function edit(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_edit'),
            403,
            'You are not allowed to list registration edit'
        );
    }

    public function update(Request $request, ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_edit'),
            403,
            'You are not allowed to list registration edit'
        );
    }

    public function destroy(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_delete'),
            403,
            'You are not allowed to list registration delete'
        );
    }
}
