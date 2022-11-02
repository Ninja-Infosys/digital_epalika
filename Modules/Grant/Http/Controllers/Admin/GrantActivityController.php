<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantActivity;
use Modules\Grant\Http\Requests\GrantActivity\StoreGrantActivityRequest;
use Modules\Grant\Http\Requests\GrantActivity\UpdateGrantActivityRequest;

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
        abort_if(Gate::denies('grantActivity_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::admin.grant_activity.create');
    }

    public function store(StoreGrantActivityRequest $request)
    {
        abort_if(Gate::denies('grantActivity_create'),
            403,
            'You are not allowed to access this resource'
        );
        GrantActivity::create($request->validated());

        toast('अनुदान क्रियाकलाप सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(GrantActivity $grantActivity)
    {
        abort_if(Gate::denies('grantActivity_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::show');
    }

    public function edit(GrantActivity $grantActivity)
    {
        abort_if(Gate::denies('grantActivity_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::admin.grant_activity.edit',compact('grantActivity'));
    }

    public function update(UpdateGrantActivityRequest $request, GrantActivity $grantActivity)
    {
        abort_if(Gate::denies('grantActivity_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $grantActivity->update($request->validated());

        toast('अनुदान क्रियाकलाप सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.grant.grantActivity.index'));
    }

    public function destroy(GrantActivity $grantActivity)
    {
        abort_if(Gate::denies('grantActivity_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $grantActivity->delete();

        toast('अनुदान क्रियाकलाप सफलतापूर्वक मेटाइयो','success');
        return back();
    }
}
