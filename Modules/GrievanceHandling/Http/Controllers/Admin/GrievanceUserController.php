<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\GrievanceHandling\Entities\GrievanceUser;

class GrievanceUserController extends Controller
{
    public function index()
    {
        $grievanceUsers = GrievanceUser::withCount('grievanceDetails')->latest()->get();
        return view('grievancehandling::admin.user.index', compact('grievanceUsers'));
    }

}
