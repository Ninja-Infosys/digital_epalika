<?php

namespace Modules\OrganizationRegistration\Http\Controllers\Admin;

use App\Models\Address\District;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\OrganizationRegistration\Entities\Business;
use Modules\OrganizationRegistration\Http\Requests\StoreBusinessRequest;

class BusinessController extends Controller
{
    public function index()
    {
//        abort_if(
//            Gate::denies('business_access'),
//            403,
//            'You are not allowed to digital board news access'
//        );
        $businesses = Business::latest()->paginate();
        return view('organizationregistration::admin.business.index', compact('businesses'));
    }

    public function create()
    {
        $districts = get_districts();
        $businessNatures = BusinessNature::all();
        $objectTransactions = ObjectTransaction::with('objectTransactions')->get();

        return view('organizationregistration::admin.business.create', compact('businessNatures', 'objectTransactions','districts'));
    }

    public function store(StoreBusinessRequest $request)
    {
        $business = Business::create($request->validated());
        return redirect()->route('admin.organizationRegistration.business.index');
    }

    public function show(Business $business)
    {
        return view('organizationregistration::admin.business.show');
    }

    public function edit(Business $business)
    {
        return view('organizationregistration::admin.business.edit');
    }

    public function update(Request $request, Business $business)
    {
        //
    }

    public function destroy(Business $business)
    {
        //
    }
}
