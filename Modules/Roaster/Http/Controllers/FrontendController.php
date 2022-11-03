<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function trainerForm()
    {
        return view('roaster::frontend.trainer-form');
    }
    public function application()
    {
        return view('roaster::frontend.application');
    }
}
