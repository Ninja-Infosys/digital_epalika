<?php

namespace Modules\BusinessRegistration\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

class FrontendController extends Controller
{

    public function business()
    {
        return view('businessregistration::frontend.index');
    }

    public function printDetail(ProprietorDetail $proprietorDetail)
    {
        $proprietorDetail->load('province','district','localBody','threeGenerationDetails',
            'introboard', 'businessDetail.province','businessDetail.district',
            'businessDetail.localBody',
            'businessRegisteredFile',
            'businessDetail.partnerDetails',
            'businessDetail.registeredBusinesses'
        );
        return view('businessregistration::frontend.printDetail', compact('proprietorDetail'));
    }

    public function printPdf(ProprietorDetail $proprietorDetail)
    {
        $proprietorDetail->load('province','district','localBody','threeGenerationDetails',
            'introboard', 'businessDetail.province','businessDetail.district',
            'businessDetail.localBody',
            'businessRegisteredFile',
            'businessDetail.partnerDetails',
            'businessDetail.registeredBusinesses'
        );
        return view('businessregistration::frontend.print', compact('proprietorDetail'));
    }


}
