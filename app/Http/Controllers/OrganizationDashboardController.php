<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationDashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('organization.dashboard');
    }
}
