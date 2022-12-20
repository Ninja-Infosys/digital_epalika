<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Farmer;

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

        return view('grant::admin.farmer.index',compact('farmers'));
    }

    public function create()
    {
        $this->checkAuthorization('farmer_create');

        return view('grant::admin.farmer.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('farmer_create');

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
