<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Ethnicity\StoreEthnicityRequest;
use App\Http\Requests\Setting\Ethnicity\UpdateEthnicityRequest;
use App\Models\Ethnicity;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EthnicityController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('ethnicity_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $ethnicities = Ethnicity::get();

        return view('admin.setting.ethnicity.index', compact('ethnicities'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('ethnicity_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.setting.ethnicity.create');
    }

    public function store(StoreEthnicityRequest $request)
    {
        abort_if(
            Gate::denies('ethnicity_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        Ethnicity::create($request->validated());
        toast('Ethnicity added successfully', 'success');

        return back();
    }

    public function show(Ethnicity $ethnicity)
    {
    }

    public function edit(Ethnicity $ethnicity)
    {
        abort_if(
            Gate::denies('ethnicity_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.setting.ethnicity.edit', compact('ethnicity'));
    }

    public function update(UpdateEthnicityRequest $request, Ethnicity $ethnicity)
    {
        abort_if(
            Gate::denies('ethnicity_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $ethnicity->update($request->validated());
        toast('Ethnicity updated successfully', 'success');

        return redirect(route('admin.ethnicity.index'));
    }

    public function destroy(Ethnicity $ethnicity)
    {
        abort_if(
            Gate::denies('ethnicity_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $ethnicity->delete();
        toast('Ethnicity deleted successfully', 'success');

        return back();
    }
}
