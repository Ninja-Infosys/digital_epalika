<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Entities\OrganizationRenew;
use Modules\BusinessRegistration\Http\Requests\OrganizationRenew\StoreOrganizationRenewRequest;
use Modules\BusinessRegistration\Http\Requests\OrganizationRenew\UpdateOrganizationRenewRequest;

class OrganizationRenewController extends Controller
{
    public function index(OrganizationRegistration $organizationRegistration)
    {
        $organizationRenews = OrganizationRenew::with('fiscalYear')->where('organization_registration_id', $organizationRegistration->id)->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['date', 'payment_receipt'], request('search'));
            }
        })->latest()->paginate(15);
        return view('businessregistration::admin.organizationRenew.index', compact('organizationRegistration', 'organizationRenews'));
    }

    public function create(OrganizationRegistration $organizationRegistration)
    {
        return view('businessregistration::admin.organizationRenew.create', compact('organizationRegistration'));
    }

    public function store(StoreOrganizationRenewRequest $request, OrganizationRegistration $organizationRegistration)
    {
        $organizationRegistration->organizationRenew()->create($request->validated() + [
                'fiscal_year_id' => officeSetting()->fiscal_year_id,
            ]);
        toast('व्यवसाय नवीकरण सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.businessRegistration.organizationRegistration.organizationRenew.index', $organizationRegistration));
    }

    public function show(OrganizationRegistration $organizationRegistration, OrganizationRenew $organizationRenew)
    {
        return view('businessregistration::admin.organizationRenew.show', compact('organizationRenew', 'organizationRegistration'));
    }

    public function edit(OrganizationRegistration $organizationRegistration, OrganizationRenew $organizationRenew)
    {
        return view('businessregistration::admin.organizationRenew.edit', compact('organizationRegistration', 'organizationRenew'));
    }

    public function update(UpdateOrganizationRenewRequest $request, OrganizationRegistration $organizationRegistration, OrganizationRenew $organizationRenew)
    {
        $organizationRegistration->organizationRenew()->update($request->validated());
        toast('व्यवसाय नवीकरण सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.businessRegistration.organizationRegistration.organizationRenew.index', $organizationRegistration));
    }

    public function destroy($id)
    {
        //
    }
}
