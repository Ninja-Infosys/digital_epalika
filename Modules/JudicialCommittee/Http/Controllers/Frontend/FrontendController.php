<?php

namespace Modules\JudicialCommittee\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FrontendController extends Controller
{
    public function complaintApplication()
    {
        return view('judicialcommittee::frontend.complaintApplication.register');
    }
}
