<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;

class FiscalYearController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('fiscalYear_access');

        $fiscalYears = FiscalYear::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }
        })
            ->get();

        return view('admin.setting.fiscalYear.index', compact('fiscalYears'));
    }

    public function create()
    {
        $this->checkAuthorization('fiscalYear_create');

        return view('admin.setting.fiscalYear.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('fiscalYear_create');

        $validationData = $request->validate(
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
        $this->checkAuthorization('fiscalYear_edit');

        return view('admin.setting.fiscalYear.edit', compact('fiscalYear'));
    }

    public function update(Request $request, FiscalYear $fiscalYear)
    {
        $this->checkAuthorization('fiscalYear_edit');

        $validationData = $request->validate(
            ['title' => 'required'],
            ['title.required' => 'आर्थिक बर्ष अनिवार्य छ|']
        );
        $fiscalYear->update($validationData);

        toast('आर्थिक बर्ष सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.fiscalYear.index'));
    }

    public function destroy(FiscalYear $fiscalYear)
    {
        $this->checkAuthorization('fiscalYear_delete');
        $fiscalYear->delete();
        toast(' आर्थिक बर्ष सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
