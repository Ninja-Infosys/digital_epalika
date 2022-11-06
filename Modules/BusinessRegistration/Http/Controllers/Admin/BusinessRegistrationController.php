<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\BusinessRegistrationTemplate;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

class BusinessRegistrationController extends Controller
{
    public function index()
    {
        $proprietors = ProprietorDetail::with('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses')
            ->latest()
            ->get();

        return view('businessregistration::admin.businessRegistration.index', compact('proprietors'));
    }

    public function show($id)
    {
        $proprietorDetail = ProprietorDetail::findOrFail($id);
        $proprietorDetail->load('province', 'district', 'localBody', 'threeGenerationDetails', 'introboard', 'businessDetail.province', 'businessDetail.district', 'businessDetail.localBody', 'businessRegisteredFile', 'businessDetail.partnerDetails', 'businessDetail.registeredBusinesses');

        return view('businessregistration::admin.businessRegistration.show', compact('proprietorDetail'));
    }

}
