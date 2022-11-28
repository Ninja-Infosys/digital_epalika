<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceUser;

class GrievanceUserController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grievanceUser_access');
        $grievanceUsers = GrievanceUser::withCount('grievanceDetails')->latest()->get();

        return view('grievancehandling::admin.user.index', compact('grievanceUsers'));
    }
}
