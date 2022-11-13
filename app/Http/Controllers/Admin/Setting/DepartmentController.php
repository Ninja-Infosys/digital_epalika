<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Department\StoreDepartmentRequest;
use App\Http\Requests\Setting\Department\UpdateDepartmentRequest;
use App\Models\Settings\Department;
use Illuminate\Support\Facades\Gate;
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

        return view('admin.setting.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.setting.department.create');
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

        return back();
    }

    public function edit(Department $department)
    {
        abort_if(
            Gate::denies('department_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.setting.department.edit', compact('department'));
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

        return redirect()->route('admin.department.index');
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

        return back();
    }
}
