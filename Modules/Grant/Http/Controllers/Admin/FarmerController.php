<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Grant\Entities\Cooperative;
use Modules\Grant\Entities\Enterprise;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Group;
use Modules\Grant\Http\Requests\Farmer\StoreFarmerRequest;
use Modules\Grant\Http\Requests\Farmer\UpdateFarmerRequest;

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

        DB::transaction(function () use ($request) {
            $farmer = Farmer::create($request->validated());

            $farmer->groups()->attach($request->input('groups'));
            $farmer->enterprises()->attach($request->input('enterprises'));
            $farmer->cooperatives()->attach($request->input('cooperatives'));
        });

        toast('कृषक सफलता पुर्वक थपियो !', 'success');
        return back();
    }
    public function edit(Farmer $farmer)
    {
        $this->checkAuthorization('farmer_edit');

        $farmer->load('cooperatives','groups','enterprises');

        $cooperatives = Cooperative::latest()->get();
        $groups = Group::latest()->get();
        $enterprises = Enterprise::latest()->get();

        return view('grant::admin.farmer.edit', compact('farmer', 'cooperatives', 'groups', 'enterprises'));
    }

    public function update(UpdateFarmerRequest $request, Farmer $farmer)
    {
        DB::transaction(function () use ($request, $farmer) {
            if ($request->hasFile('photo') && $farmer->photo) {
                $this->deleteFile($farmer->photo);
            }
            $farmer->update($request->validated());

            $farmer->groups()->sync($request->validated()['groups']);
            $farmer->enterprises()->sync($request->validated()['enterprises']);
            $farmer->cooperatives()->sync($request->validated()['cooperatives']);
        });
    }

    public function destroy(Farmer $farmer): RedirectResponse
    {
        $this->checkAuthorization('farmer_delete');

        $farmer->groups()->detach();
        $farmer->enterprises()->detach();
        $farmer->cooperatives()->detach();

        if ($farmer->photo) {
            $this->deleteFile($farmer->photo);
        }
        $farmer->delete();

        toast('कृषक सफलता पुर्वक हटाईयो !', 'success');

        return back();
    }
}
