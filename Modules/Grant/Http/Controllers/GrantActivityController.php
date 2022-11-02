<?php

namespace Modules\Grant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantActivity;

class GrantActivityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grantActivity_access'),
            403,
            'You are not allowed to access this resource'
        );

        $grantActivities=GrantActivity::all();

        return view('grant::admin.grant_activity.index',compact('grantActivities'));
    }

    public function create()
    {
        return view('grant::admin.grant_activity.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit($id)
    {
        return view('grant::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
