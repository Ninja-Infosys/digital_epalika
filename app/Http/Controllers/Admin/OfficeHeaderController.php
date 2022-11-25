<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeHeader\UpdateOfficeHeaderRequest;
use App\Models\OfficeHeader;
use Illuminate\Support\Facades\Gate;

class OfficeHeaderController extends Controller
{
    public function edit(OfficeHeader $officeHeader)
    {
        abort_if(
            Gate::denies('officeHeader_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.setting.officeSetting.edit', compact('officeHeader'));
    }

    public function update(UpdateOfficeHeaderRequest $request, OfficeHeader $officeHeader)
    {

        abort_if(
            Gate::denies('officeHeader_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $officeHeader->update($request->validated());
        toast('सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.officeSetting.index'));
    }

    public function destroy(OfficeHeader $officeHeader)
    {

        abort_if(
            Gate::denies('officeHeader_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $officeHeader->delete();
        toast('सफलतापूर्वक मेटियो', 'success');

        return back();
    }
}
