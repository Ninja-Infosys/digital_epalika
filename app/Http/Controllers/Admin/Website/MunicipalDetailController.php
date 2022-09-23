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
        //
    }

    public function show(MunicipalDetail $municipalDetail)
    {
        //
    }

    public function edit(MunicipalDetail $municipalDetail)
    {
        //
    }

    public function update(UpdateMunicipalDetailRequest $request, MunicipalDetail $municipalDetail)
    {
        //
    }

    public function destroy(MunicipalDetail $municipalDetail)
    {
        //
    }
}
