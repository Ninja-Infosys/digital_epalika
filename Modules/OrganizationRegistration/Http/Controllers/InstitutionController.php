<?php

namespace Modules\OrganizationRegistration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\OrganizationRegistration\Entities\Institution;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions=Institution::latest()->paginate();
        return view('organizationregistration::admin.institution.index',compact('institutions'));
    }

    public function create()
    {
        return view('organizationregistration::admin.institution.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Institution $institution)
    {
        return view('organizationregistration::admin.institution.show');
    }

    public function edit(Institution $institution)
    {
        return view('organizationregistration::admin.institution.edit');
    }

    public function update(Request $request, Institution $institution)
    {
        //
    }

    public function destroy(Institution $institution)
    {
        //
    }
}
