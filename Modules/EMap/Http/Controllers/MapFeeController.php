<?php

namespace Modules\EMap\Http\Controllers;

use App\Models\Settings\Units\Unit;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\EMap\Entities\MapFee;
use Modules\EMap\Http\Requests\MapFee\StoreMapFeeRequest;
use Modules\EMap\Http\Requests\MapFee\UpdateMapFeeRequest;

class MapFeeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mapFee_access'),
            403,
            'You are not allowed to access this resource'
        );

        $mapFees = MapFee::with('unit')->get();

        return view('emap::admin.map_fee.index', compact('mapFees'));
    }

    public function create()
    {
        abort_if(Gate::denies('mapFee_create'),
            403,
            'You are not allowed to access this resource'
        );

        $units = Unit::orderBy('position')->get();

        return view('emap::admin.map_fee.create', compact('units'));
    }

    public function store(StoreMapFeeRequest $request)
    {
        abort_if(Gate::denies('mapFee_create'),
            403,
            'You are not allowed to access this resource'
        );

        MapFee::create($request->validated());

        toast('नक्सा शुल्क सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(MapFee $mapFee)
    {
        abort_if(Gate::denies('mapFee_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('emap::show');
    }

    public function edit(MapFee $mapFee)
    {
        abort_if(Gate::denies('mapFee_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $units = Unit::orderBy('position')->get();

        return view('emap::admin.map_fee.edit', compact('mapFee', 'units'));
    }

    public function update(UpdateMapFeeRequest $request, MapFee $mapFee)
    {
        abort_if(Gate::denies('mapFee_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $mapFee->update($request->validated());

        toast('नक्सा शुल्क सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('emap.admin.mapFee.index'));
    }

    public function destroy(MapFee $mapFee)
    {
        abort_if(Gate::denies('mapFee_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $mapFee->delete();

        toast('नक्सा शुल्क सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
