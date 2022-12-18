<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceUser;
use Illuminate\Database\Eloquent\Builder;
class GrievanceUserController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('grievanceUser_access');
        $grievanceUsers = GrievanceUser::withCount('grievanceDetails')
        ->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['name','email','phone'], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('grievancehandling::admin.user.index', compact('grievanceUsers'));
    }

    public function show(GrievanceUser $grievanceUser): Factory|View|Application
    {
        $this->checkAuthorization('grievanceUser_access');

        $grievanceUser->loadCount('grievanceDetails');

        return view('grievancehandling::admin.user.show', compact('grievanceUser'));
    }
}
