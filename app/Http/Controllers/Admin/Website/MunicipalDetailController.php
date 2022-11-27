<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\MunicipalDetail\StoreMunicipalDetailRequest;
use App\Http\Requests\Website\MunicipalDetail\UpdateMunicipalDetailRequest;
use App\Models\Website\MunicipalDetail;
use Illuminate\Support\Facades\Gate;

class MunicipalDetailController extends Controller
{
    public function index()
    {

        abort_if(
            Gate::denies('municipalDetail_access'),
            403,
            'You are not allowed to access this resource'
        );

        $municipalDetails = MunicipalDetail::orderBy('position')->get();

        return view('admin.website.municipal_detail.index', compact('municipalDetails'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('municipalDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.municipal_detail.create');
    }

    public function store(StoreMunicipalDetailRequest $request)
    {

        abort_if(
            Gate::denies('municipalDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
        MunicipalDetail::create($request->validated());

        toast('नगरपालिका विवरण सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(MunicipalDetail $municipalDetail)
    {
        //
    }

    public function edit(MunicipalDetail $municipalDetail)
    {

        abort_if(
            Gate::denies('municipalDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('admin.website.municipal_detail.edit', compact('municipalDetail'));
    }

    public function update(UpdateMunicipalDetailRequest $request, MunicipalDetail $municipalDetail)
    {

        abort_if(
            Gate::denies('municipalDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $municipalDetail->update($request->validated());

        toast('नगरपालिका विवरण सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.website.municipalDetail.index'));
    }

    public function destroy(MunicipalDetail $municipalDetail)
    {

        abort_if(
            Gate::denies('municipalDetail_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $municipalDetail->delete();

        toast('नगरपालिका विवरण सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
