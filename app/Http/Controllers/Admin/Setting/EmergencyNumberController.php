<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Requests\Setting\EmergencyNumber\StoreEmergencyNumberRequest;
use App\Http\Requests\Setting\EmergencyNumber\UpdateEmergencyNumberRequest;
use App\Models\Settings\EmergencyNumber;
use App\Http\Controllers\Controller;
use App\Models\Settings\EmergencyCategory;

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
        $emergencyCategories = EmergencyCategory::all();
        return view('admin.setting.emergencyNumber.create', compact('emergencyCategories'));
    }

    public function store(StoreEmergencyNumberRequest $request)
    {
        $this->checkAuthorization('emergencyNumber_create');
        EmergencyNumber::create($request->validated());

        toast('आपतकालीन नम्बर सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_edit');
        $emergencyCategories = EmergencyCategory::all();

        return view('admin.setting.emergencyNumber.edit', compact('emergencyNumber', 'emergencyCategories'));
    }

    public function update(UpdateEmergencyNumberRequest $request, EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_edit');

        $emergencyNumber->update($request->validated());

        toast('आपतकालीन नम्बर सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.generalSetting.emergencyNumber.index'));
    }

    public function destroy(EmergencyNumber $emergencyNumber)
    {
        $this->checkAuthorization('emergencyNumber_delete');
        $emergencyNumber->delete();
        toast('आपतकालीन नम्बर सफलतापूर्वक मेटियो!', 'success');

        return back();
    }
}
