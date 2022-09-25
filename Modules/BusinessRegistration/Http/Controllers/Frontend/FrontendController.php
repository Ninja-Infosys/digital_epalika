<?php

namespace Modules\BusinessRegistration\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function businessRegistration()
    {
        return view('businessregistration::frontend.index');
    }
}
