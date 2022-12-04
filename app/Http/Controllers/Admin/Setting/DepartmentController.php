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
        $this->checkAuthorization('department_access');

        $departments = Department::latest()->get();

        return view('admin.setting.department.index', compact('departments'));
    }

    public function create()
    {
        $this->checkAuthorization('department_create');
        return view('admin.setting.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->checkAuthorization('department_create');

        Department::create($request->validated());

        toast('विभाग सफलतापूर्वक थपियो!', 'success');

        return back();
    }

    public function edit(Department $department)
    {
        $this->checkAuthorization('department_edit');

        return view('admin.setting.department.edit', compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $this->checkAuthorization('department_edit');

        $department->update($request->validated());
        toast('विभाग सफलतापूर्वक अद्यावधिक गरियो!', 'success');

        return redirect()->route('admin.department.index');
    }

    public function destroy(Department $department)
    {
        $this->checkAuthorization('department_delete');

        $department->delete();

        toast('विभाग सफलतापूर्वक हटाइयो!', 'success');

        return back();
    }
}
