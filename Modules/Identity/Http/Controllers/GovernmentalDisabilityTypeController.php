<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\CardColor;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Http\Requests\StoreGovernmentalDisablityRequest;
use Modules\Identity\Http\Requests\UpdateGovernmentalDisablityRequest;

class GovernmentalDisabilityTypeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('governmentalDisabilityType_access');
        $governmentalDisabilityType = GovernmentalDisabilityType::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['type','card_color_id'], request('search'));
            }
        })
            ->latest()->paginate(10);
        return view('identity::admin.setting.governmentalDisabilityType.index',compact('governmentalDisabilityType'));
    }

    public function create()
    {
        $this->checkAuthorization('governmentalDisabilityType_create');
        $cardColors = CardColor::all();
        return view('identity::admin.setting.governmentalDisabilityType.create',compact('cardColors'));
    }

    public function store(StoreGovernmentalDisablityRequest $request)
    {
        $this->checkAuthorization('governmentalDisabilityType_create');
        GovernmentalDisabilityType::create($request->validated());
        toast('governmental Disability Type सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(GovernmentalDisabilityType $governmentalDisabilityType)
    {
        $this->checkAuthorization('governmentalDisabilityType_access');
        return view('identity::show');
    }

    public function edit(GovernmentalDisabilityType $governmentalDisabilityType)
    {
        return view('identity::edit');
    }

    public function update(UpdateGovernmentalDisablityRequest $request, GovernmentalDisabilityType $governmentalDisabilityType)
    {
        return view('identity::admin.setting.governmentalDisabilityType.edit');
    }

    public function destroy(GovernmentalDisabilityType $governmentalDisabilityType)
    {
        //
    }
}
