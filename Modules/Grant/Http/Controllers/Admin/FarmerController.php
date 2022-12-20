<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Grant\Entities\Cooperative;
use Modules\Grant\Entities\Enterprise;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Group;
use Modules\Grant\Http\Requests\Farmer\StoreFarmerRequest;

class FarmerController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('farmer_access');

        $farmers = Farmer::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['unique_id', 'first_name', 'citizenship_no', 'farmer_id_card_no', 'national_id_card_no', 'phone_no'], request('search'));
            }
        })
            ->latest()->paginate(10);

        return view('grant::admin.farmer.index', compact('farmers'));
    }

    public function create()
    {
        $this->checkAuthorization('farmer_create');

        $cooperatives = Cooperative::latest()->get();
        $groups = Group::latest()->get();
        $enterprises = Enterprise::latest()->get();

        return view('grant::admin.farmer.create', compact('cooperatives', 'groups', 'enterprises'));
    }

    public function store(StoreFarmerRequest $request)
    {
        $this->checkAuthorization('farmer_create');

        $farmer = DB::transaction(function () use ($request) {
            $farmer = Farmer::create($request->validated() + $request->validated()['address']);

            $farmer->groups()->attach($request->validated()['groups']);
            $farmer->enterprises()->attach($request->validated()['enterprises']);
            $farmer->cooperatives()->attach($request->validated()['cooperatives']);

        });
        toast('कृषक सफलता पुर्वक थपियो !', 'success');
        return back();
    }

    public function show(Farmer $farmer)
    {
        return view('grant::show');
    }

    public function edit(Farmer $farmer)
    {
        return view('grant::edit');
    }

    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    public function destroy(Farmer $farmer)
    {
        //
    }
}
