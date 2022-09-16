<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employee_access'),
            403,
            'You are not allowed to employee access'
        );

        $employees = Employee::orderBy('position')->get();

        return view('digitalboard::employee.index', compact('employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'),
            403,
            'You are not allowed to employee create'
        );

        return view('digitalboard::employee.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('employee_create'),
            403,
            'You are not allowed to employee create'
        );
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_access'),
            403,
            'You are not allowed to employee access'
        );

        return view('digitalboard::employee.show',compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('digitalboard::employee.edit',compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'),
            403,
            'You are not allowed to employee edit'
        );
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'),
            403,
            'You are not allowed to employee delete'
        );
    }
}
