<?php

namespace Modules\Roaster\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\Designation;
use Modules\Roaster\Http\Requests\Settings\Designation\StoreDesignationRequest;
use Modules\Roaster\Http\Requests\Settings\Designation\UpdateDesignationRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DesignationController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('designation_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $designations = Designation::latest()->get();
        return view('roaster::admin.setting.designation.index', compact('designations'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('designation_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('roaster::admin.setting.designation.create');
    }

    public function store(StoreDesignationRequest $request)
    {
        abort_if(
            Gate::denies('designation_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $designation = Designation::create($request->validated());

        toast('Designation Added successfully!', 'success');
        return redirect()->route('admin.roaster.setting.designation.index');

    }

    public function show(Designation $designation)
    {
        abort_if(
            Gate::denies('designation_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('roaster::show');
    }

    public function edit(Designation $designation)
    {
        abort_if(
            Gate::denies('designation_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('roaster::admin.setting.designation.edit', compact('designation'));
    }

    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        abort_if(
            Gate::denies('designation_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $designation->update($request->validated());
        toast('Designation Updated successfully!', 'success');
        return redirect(route('admin.roaster.setting.designation.index'));

    }

    public function destroy(Designation $designation)
    {
        abort_if(
            Gate::denies('designation_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $designation->delete();
        toast('Designation Deleted successfully!', 'success');
        return back();
    }
}
