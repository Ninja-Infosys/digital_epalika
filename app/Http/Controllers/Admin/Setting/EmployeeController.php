<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Employee\StoreEmployeeRequest;
use App\Http\Requests\Setting\Employee\UpdateEmployeeRequest;
use App\Models\Settings\Branch;
use App\Models\Settings\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('employee_access');

        $employees = Employee::orderBy('position')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['designation','name',''], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('admin.setting.employee.index', compact('employees'));
    }

    public function create()
    {
        $this->checkAuthorization('employee_create');
        $branches = Branch::all();
        $allemployees = Employee::all();
        return view('admin.setting.e  mployee.create',compact('branches','allemployees'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->checkAuthorization('employee_create');

        Employee::create($request->validated());
        toast('कर्मचारी सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Employee $employee)
    {

    }

    public function edit(Employee $employee)
    {
        $this->checkAuthorization('employee_edit');
        $branches = Branch::all();
        $allemployees = Employee::all();
        return view('admin.setting.employee.edit', compact('employee','branches','allemployees'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->checkAuthorization('employee_edit');

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                $this->deleteFile($employee->photo);
            }
        }

        $employee->update($request->validated());

        toast('कर्मचारी सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.generalSetting.employee.index'));
    }

    public function destroy(Employee $employee)
    {
        $this->checkAuthorization('employee_delete');
        if ($employee->photo) {
            $this->deleteFile($employee->photo);
        }

        $employee->delete();
        toast(' कर्मचारी सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }

        public function updateEmployeeStatus(Employee $employee): RedirectResponse
        {
            $this->checkAuthorization('employee_access');
            $employee->update([
                'status' => !$employee->status,
            ]);
            toast('कर्मचारी स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

            return back();
        }
}
