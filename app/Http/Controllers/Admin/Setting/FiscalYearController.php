<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FiscalYearController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fiscalYear_access'),
            403,
            'You are not allowed to digital board news access'
        );
        $fiscalYears = FiscalYear::get();
        return view('admin.setting.fiscalYear.index', compact('fiscalYears'));
    }

    public function create()
    {
        abort_if(Gate::denies('fiscalYear_create'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.setting.fiscalYear.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('fiscalYear_create'),
            403,
            'You are not allowed to digital board news access'
        );
          $validationData =  $request->validate(
              ['title' => 'required'],
              ['title.required' => 'आर्थिक बर्ष अनिवार्य छ|']
          );

        FiscalYear::create($validationData);
        toast('आर्थिक बर्ष सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(FiscalYear $fiscalYear)
    {
        //
    }

    public function edit(FiscalYear $fiscalYear)
    {
        abort_if(Gate::denies('fiscalYear_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.setting.fiscalYear.edit', compact('fiscalYear'));
    }

    public function update(Request $request, FiscalYear $fiscalYear)
    {
        abort_if(Gate::denies('fiscalYear_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        $validationData =  $request->validate(
            ['title' => 'required'],
            ['title.required' => 'आर्थिक बर्ष अनिवार्य छ|']
        );
        $fiscalYear->update($validationData);

        toast('आर्थिक बर्ष सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.fiscalYear.index'));
    }

    public function destroy(FiscalYear $fiscalYear)
    {
        abort_if(Gate::denies('fiscalYear_delete'),
            403,
            'You are not allowed to digital board news access'
        );
        $fiscalYear->delete();
        toast(' आर्थिक बर्ष सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
