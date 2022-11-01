<?php

namespace Modules\Roaster\Http\Controllers\Setting;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\Department;
use Modules\Roaster\Http\Requests\Settings\Department\StoreDepartmentRequest;
use Modules\Roaster\Http\Requests\Settings\Department\UpdateDepartmentRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DepartmentController extends Controller
{
    public function index()
    {

        abort_if(
            Gate::denies('department_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $departments = Department::latest()->get();
        return view('roaster::admin.setting.department.index', compact('departments'));
    }

    public function store(StoreDepartmentRequest $request)
    {
        abort_if(
            Gate::denies('department_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        Department::create($request->validated());

        toast('department added successfully!', 'success');
        return redirect()->route('admin.roaster.setting.department.index');
    }

    public function show(Department $department)
    {
        abort_if(
            Gate::denies('department_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('roaster::admin.setting.department.index', compact('department'));
    }

    public function edit(Department $department)
    {
        abort_if(
            Gate::denies('department_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('roaster::admin.setting.department.edit', compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        abort_if(
            Gate::denies('department_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $department->update($request->validated());
        toast('department updated successfully!', 'success');
        return redirect()->route('admin.roaster.setting.department.index');
    }

    public function destroy(Department $department)
    {
        abort_if(
            Gate::denies('department_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $department->delete();

        toast('department deleted successfully!', 'success');
        return redirect()->route('admin.roaster.setting.department.index');
    }
}
