<?php

namespace Modules\Grant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index(){
        return view('grant::frontend.index');
    }

    public function applicationRegistration()
    {
        return view('grant::frontend.application_registration');

    }
}
