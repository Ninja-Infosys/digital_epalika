<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Http\Requests\Employee\StoreEmployeeRequest;
use Modules\DigitalBoard\Http\Requests\Employee\UpdateEmployeeRequest;
use Illuminate\Database\Eloquent\Builder;

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


        return view('digitalboard::admin.employee.index', compact('employees'));
    }

    public function create()
    {
        $this->checkAuthorization('employee_create');

        return view('digitalboard::admin.employee.create');
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
        $this->checkAuthorization('employee_access');

        return view('digitalboard::admin.employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $this->checkAuthorization('employee_edit');

        return view('digitalboard::admin.employee.edit', compact('employee'));
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

        return redirect(route('admin.digitalBoard.employee.index'));
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
