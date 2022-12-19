<?php

namespace Modules\DigitalBoard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Http\Requests\Employee\StoreEmployeeRequest;
use Modules\DigitalBoard\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('employee_access'),
            403,
            'You are not allowed to employee access'
        );

        $employees = Employee::orderBy('position')->get();

        return view('digitalboard::employee.index', compact('employees'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('employee_create'),
            403,
            'You are not allowed to employee create'
        );

        return view('digitalboard::employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        abort_if(
            Gate::denies('employee_create'),
            403,
            'You are not allowed to employee create'
        );

        Employee::create($request->validated());
        toast('कर्मचारी सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Employee $employee)
    {
        abort_if(
            Gate::denies('employee_access'),
            403,
            'You are not allowed to employee access'
        );

        return view('digitalboard::employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        abort_if(
            Gate::denies('employee_edit'),
            403,
            'You are not allowed to employee edit'
        );
        return view('digitalboard::employee.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        abort_if(
            Gate::denies('employee_edit'),
            403,
            'You are not allowed to employee edit'
        );

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                $this->deleteFile($employee->photo);
            }
        }

        $employee->update($request->validated());

        toast('कर्मचारी सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.digitalBoard.employee.index'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(
            Gate::denies('employee_delete'),
            403,
            'You are not allowed to employee delete'
        );
        if ($employee->photo) {
            $this->deleteFile($employee->photo);
        }

        $employee->delete();
        toast(' कर्मचारी सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }

    public function updateEmployeeStatus(Employee $employee)
    {
        abort_if(
            Gate::denies('employee_access'),
            403,
            'You are not allowed to employee access'
        );
        $employee->update([
            'status' => !$employee->status
        ]);
        toast('कर्मचारी स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
