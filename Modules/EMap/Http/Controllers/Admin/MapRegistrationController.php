<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapRegistration;
use Modules\EMap\Entities\MapRegistrationParticular;
use Modules\EMap\Http\Requests\MapRegistration\StoreMapRegistrationRequest;
use Modules\EMap\Http\Requests\MapRegistration\UpdateMapRegistrationRequest;

class MapRegistrationController extends Controller
{
    public function create(MapApply $mapApply)
    {
        $mapApply->load(['storeyDetails', 'storeyDetails.mapFee']);

        return view('emap::admin.map.map-registration.create', compact('mapApply'));
    }

    public function store(StoreMapRegistrationRequest $request, MapApply $mapApply): RedirectResponse
    {
        DB::transaction(function () use ($request, $mapApply) {
            $mapRegistration = MapRegistration::create($request->validated() + ['map_apply_id' => $mapApply->id]);

            if (!empty($request->input('particulars'))) {
                foreach ($request->input('particulars') as $particular) {
                    $mapRegistration->mapRegistrationParticulars()->create($particular);
                }
            }

            if (empty($mapApply->registration_no)) {
                $registrationNo = MapApply::whereFiscalYearId($mapApply->fiscal_year_id)->max('registration_no') + 1;
                $mapApply->update([
                    'registration_date' => now(),
                    'registration_no' => $registrationNo,
                ]);
            }
        });

        toast('दस्तुर तथा दर्ता सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(MapApply $mapApply, MapRegistration $mapRegistration)
    {
        return view('emap::admin.map.map-registration.edit', compact('mapApply', 'mapRegistration'));
    }

    public function update(UpdateMapRegistrationRequest $request, MapApply $mapApply, MapRegistration $mapRegistration): RedirectResponse
    {
        DB::transaction(function () use ($request, $mapRegistration) {
            $mapRegistration->update($request->validated());

            if (!empty($request->input('particulars'))) {
                foreach ($request->input('particulars') as $particular) {
                    if ($particular['id']) {
                        MapRegistrationParticular::find($particular['id'])?->update($particular);
                    } else {
                        $mapRegistration->mapRegistrationParticulars()->create($particular);
                    }
                }
            }
        });

        toast('दस्तुर तथा दर्ता सफलतापूर्वक अपडेट भयो', 'success');

        return back();
    }
}
