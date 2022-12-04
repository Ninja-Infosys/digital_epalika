<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use App\Models\Settings\FiscalYear;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\BusinessPurpose;
use Modules\BusinessRegistration\Entities\InvestmentRevenue;
use Modules\BusinessRegistration\Entities\ObjectTransaction;

class BusinessRegistrationReportController extends Controller
{
    use NepaliDateConverter;

    public function dateWise(Request $request)
    {
        $businessDetails=BusinessDetail::with('proprietorDetail','localBody')->filterData($request->all())->get();
        $fiscalYears = FiscalYear::get();
        $businessPurposes = BusinessPurpose::get();
        $objectTransactions = ObjectTransaction::get();
        $investmentRevenues = InvestmentRevenue::get();
        return view('businessregistration::admin.businessRegistrationReport.index',compact('investmentRevenues','objectTransactions','businessDetails','fiscalYears','businessPurposes'));
    }

}
