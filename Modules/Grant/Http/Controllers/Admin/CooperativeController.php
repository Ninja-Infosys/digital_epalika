<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Address\Province;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $cooperatives=Cooperative::all();
        return view('grant::admin.cooperative.index',compact('cooperatives'));
    }

    public function create()
    {
        $this->checkAuthorization('cooperative_create');
        $cooperativeTypes=CooperativeType::all();
        $affiliations=Affiliation::all();
        $farmers=Farmer::all();
        return view('grant::admin.cooperative.create',compact('affiliations', 'cooperativeTypes','farmers'));
    }

    public function store(StoreCooperativeRequest $request)
    {
        $this->checkAuthorization('cooperative_create');

        DB::transaction(function () use ($request) {
            $cooperative = Cooperative::create($request->validated()+[
                'user_id'=>auth()->user()->id
                ]);

            $cooperative->farmers()->attach($request->validated('farmers'));
        });

        toast('सहकारी सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show($id)
    {
        $this->checkAuthorization('cooperative_access');
        return view('grant::show');
    }

    public function edit(Cooperative $cooperative)
    {
        $this->checkAuthorization('cooperative_edit');

        $cooperativeTypes=CooperativeType::all();
        $affiliations=Affiliation::all();
        $farmers=Farmer::all();
        return view('grant::admin.cooperative.edit', compact('cooperative','cooperativeTypes', 'affiliations', 'farmers'));
    }

    public function update(UpdateCooperativeRequest $request, $id)
    {
        $this->checkAuthorization('cooperative_edit');
    }

    public function destroy($id)
    {
        $this->checkAuthorization('cooperative_delete');
    }
}
