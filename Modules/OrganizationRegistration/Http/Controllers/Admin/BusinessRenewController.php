<?php

namespace Modules\OrganizationRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Database\Eloquent\Builder;
use Modules\OrganizationRegistration\Entities\Business;
use Modules\OrganizationRegistration\Entities\BusinessRenew;
use Modules\OrganizationRegistration\Http\Requests\BusinessRenew\StoreBusinessRenewRequest;
use Modules\OrganizationRegistration\Http\Requests\BusinessRenew\UpdateBusinessRenewRequest;

class BusinessRenewController extends Controller
{
    public function index(Business $business)
    {
//        $businessRenews=BusinessRenew::latest()->paginate(10);
        $businessRenews = BusinessRenew::where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['fiscal_year_id', 'business_renew_date', 'date_to_be_maintained', 'renew_amount', 'penalty_amount', 'payment_receipt','payment_receipt_date'], request('search'));
            }
        })
            ->latest()->paginate(10);
        return view('organizationregistration::admin.business_renew.index',compact('businessRenews','business'));
    }

    public function create(Business $business)
    {
        $fiscalYears=FiscalYear::all();
        return view('organizationregistration::admin.business_renew.create',compact('business','fiscalYears'));
    }

    public function store(StoreBusinessRenewRequest $request,Business $business)
    {
        BusinessRenew::create($request->validated()+[
            'business_id'=>$business->id
            ]);

        toast('व्यवसायको नवीकरण सफलता पुर्बक थपियो', 'success');
        return back();
    }

    public function show(Business $business,BusinessRenew $businessRenew)
    {
        return view('organizationregistration::show');
    }

    public function edit( Business $business ,BusinessRenew $businessRenew)
    {

        $fiscalYears=FiscalYear::all();
        return view('organizationregistration::admin.business_renew.edit',compact('business','businessRenew','fiscalYears'));
    }

    public function update(UpdateBusinessRenewRequest $request, Business $business, BusinessRenew $businessRenew)
    {
        $businessRenew->update($request->validated());
        toast('व्यवसायको नवीकरण सफलता पुर्बक सम्पादन गरियो','success');
        return redirect(route('admin.organizationRegistration.business.businessRenew.index',$business));
    }

    public function destroy(Business $business,BusinessRenew $businessRenew)
    {
        $businessRenew->delete();

        toast('व्यवसायको नवीकरण सफलता पुर्बक हटाइयो','success');
    }
}
