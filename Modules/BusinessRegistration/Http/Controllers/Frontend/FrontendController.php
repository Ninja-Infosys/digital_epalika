<?php

namespace Modules\BusinessRegistration\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function business()
    {
        return view('businessregistration::frontend.index');
    }

    public function registrationForm()
    {

        return view('businessregistration::frontend.register.register');
    }


}
