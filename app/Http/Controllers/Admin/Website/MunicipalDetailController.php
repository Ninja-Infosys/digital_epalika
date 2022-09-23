<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\MunicipalDetail\StoreMunicipalDetailRequest;
use App\Http\Requests\Website\MunicipalDetail\UpdateMunicipalDetailRequest;
use App\Models\Website\MunicipalDetail;
use Illuminate\Http\Request;

class MunicipalDetailController extends Controller
{
    public function index()
    {
        $municipalDetails = MunicipalDetail::orderBy('position')->get();

        return view('admin.website.municipal_detail.index', compact('municipalDetails'));
    }

    public function create()
    {
        return view('admin.website.municipal_detail.create');
    }

    public function store(StoreMunicipalDetailRequest $request)
    {
        MunicipalDetail::create($request->validated());

        toast('नगरपालिका विवरण सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(MunicipalDetail $municipalDetail)
    {
        //
    }

    public function edit(MunicipalDetail $municipalDetail)
    {
        return view('admin.website.municipal_detail.edit',compact('municipalDetail'));
    }

    public function update(UpdateMunicipalDetailRequest $request, MunicipalDetail $municipalDetail)
    {
        $municipalDetail->update($request->validated());

        toast('नगरपालिका विवरण सफलतापूर्वक अपडेट गरियो','success');
        return redirect(route('admin.website.municipalDetail.index'));
    }

    public function destroy(MunicipalDetail $municipalDetail)
    {
        $municipalDetail->delete();

        toast('नगरपालिका विवरण सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
