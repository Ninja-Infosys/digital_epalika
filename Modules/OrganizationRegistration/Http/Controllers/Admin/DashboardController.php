<?php

namespace Modules\OrganizationRegistration\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {


        return view('organizationregistration::admin.dashboard');
    }
}
