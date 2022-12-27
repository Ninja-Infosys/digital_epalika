<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Address\Province;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Grant\Entities\Affiliation;
use Modules\Grant\Entities\Cooperative;
use Modules\Grant\Entities\CooperativeType;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Http\Requests\Cooperative\StoreCooperativeRequest;
use Modules\Grant\Http\Requests\Cooperative\UpdateCooperativeRequest;

class CooperativeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('cooperative_access');

        $cooperatives = Cooperative::with('cooperativeType')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['unique_id', 'registration_no', 'name', 'cooperativeType',], request('search'));
            }
        })
            ->latest()->paginate(10);

        return view('grant::admin.cooperative.index', compact('cooperatives'));
    }

    public function create()
    {
        $this->checkAuthorization('cooperative_create');

        $cooperativeTypes = CooperativeType::all();
        $affiliations = Affiliation::all();
        $farmers = Farmer::all();

        return view('grant::admin.cooperative.create', compact('affiliations', 'cooperativeTypes', 'farmers'));
    }

    public function store(StoreCooperativeRequest $request)
    {
        $this->checkAuthorization('cooperative_create');

        DB::transaction(function () use ($request) {
            $cooperative = Cooperative::create($request->validated());

            $cooperative->farmers()->attach($request->input('farmers'));
        });

        toast('सहकारी सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Cooperative $cooperative)
    {
        $this->checkAuthorization('cooperative_access');
        $cooperative->load('province', 'district', 'localBody', 'farmers');
        return view('grant::admin.cooperative.show', compact('cooperative'));
    }

    public function edit(Cooperative $cooperative)
    {
        $this->checkAuthorization('cooperative_edit');

        $cooperativeTypes = CooperativeType::all();
        $affiliations = Affiliation::all();
        $farmers = Farmer::all();
        return view('grant::admin.cooperative.edit', compact('cooperative', 'cooperativeTypes', 'affiliations', 'farmers'));
    }

    public function update(UpdateCooperativeRequest $request, Cooperative $cooperative)
    {
        $this->checkAuthorization('cooperative_edit');
        DB::transaction(function () use ($request, $cooperative) {
            $cooperative->update($request->validated());

            $cooperative->farmers()->sync($request->input('farmers'));
        });

        toast('सहकारी सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grant.cooperative.index'));
    }

    public function destroy(Cooperative $cooperative)
    {
        $this->checkAuthorization('cooperative_delete');

        $cooperative->farmers()->detach();

        $cooperative->delete();

        toast('सहकारी सफलतापूर्वक हटाइयो', 'success');
        return back();
    }
}
