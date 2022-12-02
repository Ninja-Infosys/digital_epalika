<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Requests\Setting\EmergencyNumber\StoreEmergencyNumberRequest;
use App\Http\Requests\Setting\EmergencyNumber\UpdateEmergencyNumberRequest;
use App\Models\Ethnicity;
use App\Models\Settings\EmergencyNumber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmergencyNumberController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('emergencyNumber_access');

        $EmergencyNumbers = EmergencyNumber::get();

        return view('admin.setting.emergencyNumber.index', compact('EmergencyNumbers'));
    }

    public function create()
    {
        $this->checkAuthorization('emergencyNumber_create');

        return view('admin.setting.emergencyNumber.create');

    }

    public function store(StoreEmergencyNumberRequest $request)
    {
        $this->checkAuthorization('emergencyNumber_create');

        EmergencyNumber::create($request->validated());

        toast('Emergency Number added successfully', 'success');
        return back();
    }

    public function edit(EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_edit');

        return view('admin.setting.emergencyNumber.edit', compact('emergencyNumber'));

    }

    public function update(UpdateEmergencyNumberRequest $request, EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_edit');

        $emergencyNumber->update($request->validated());

        toast('Emergency Number updated successfully', 'success');

        return redirect(route('admin.emergencyNumber.index'));
    }

    public function destroy(EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_delete');
        $emergencyNumber->delete();
        toast('Emergency Number Deleted successfully!', 'success');

        return back();
    }
}
