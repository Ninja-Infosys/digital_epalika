<?php

namespace Modules\OrganizationRegistration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\OrganizationRegistration\Entities\Institution;
use Modules\OrganizationRegistration\Http\Requests\Institution\StoreInstitutionRequest;
use Modules\OrganizationRegistration\Http\Requests\Institution\UpdateInstitutionRequest;

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
        dd($request->all());
        Institution::create($request->validated());

        toast('','success');
        return back();
    }

    public function show(Institution $institution)
    {
        return view('organizationregistration::admin.institution.show');
    }

    public function edit(Institution $institution)
    {
        return view('organizationregistration::admin.institution.edit');
    }

    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        //
    }

    public function destroy(Institution $institution)
    {
        //
    }
}
