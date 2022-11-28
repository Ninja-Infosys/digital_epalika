<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantActivity;
use Modules\Grant\Http\Requests\GrantActivity\StoreGrantActivityRequest;
use Modules\Grant\Http\Requests\GrantActivity\UpdateGrantActivityRequest;

class GrantActivityController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantActivity_access');

        $grantActivities = GrantActivity::all();

        return view('grant::admin.grant_activity.index', compact('grantActivities'));
    }

    public function create()
    {
        $this->checkAuthorization('grantActivity_create');

        return view('grant::admin.grant_activity.create');
    }

    public function store(StoreGrantActivityRequest $request)
    {
        $this->checkAuthorization('grantActivity_create');
        GrantActivity::create($request->validated());

        toast('अनुदान क्रियाकलाप सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(GrantActivity $grantActivity)
    {
        $this->checkAuthorization('grantActivity_access');

        return view('grant::show');
    }

    public function edit(GrantActivity $grantActivity)
    {
        $this->checkAuthorization('grantActivity_edit');

        return view('grant::admin.grant_activity.edit', compact('grantActivity'));
    }

    public function update(UpdateGrantActivityRequest $request, GrantActivity $grantActivity)
    {
        $this->checkAuthorization('grantActivity_edit');
        $grantActivity->update($request->validated());

        toast('अनुदान क्रियाकलाप सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.grantActivity.index'));
    }

    public function destroy(GrantActivity $grantActivity)
    {
        $this->checkAuthorization('grantActivity_delete');
        $grantActivity->delete();

        toast('अनुदान क्रियाकलाप सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
