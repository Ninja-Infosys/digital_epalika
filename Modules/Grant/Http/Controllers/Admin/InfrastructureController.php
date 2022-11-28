<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\Infrastructure;
use Modules\Grant\Http\Requests\Infrastructure\StoreInfrastructureRequest;
use Modules\Grant\Http\Requests\Infrastructure\UpdateInfrastructureRequest;

class InfrastructureController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('infrastructure_access');

        $infrastructures = Infrastructure::all();

        return view('grant::admin.infrastructure.index', compact('infrastructures'));
    }

    public function create()
    {
        $this->checkAuthorization('infrastructure_create');

        return view('grant::admin.infrastructure.create');
    }

    public function store(StoreInfrastructureRequest $request)
    {
        $this->checkAuthorization('infrastructure_create');

        Infrastructure::create($request->validated());

        toast('पूर्वाधार शीर्षक सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Infrastructure $infrastructure)
    {
        $this->checkAuthorization('infrastructure_access');

        return view('grant::show');
    }

    public function edit(Infrastructure $infrastructure)
    {
        $this->checkAuthorization('infrastructure_edit');

        return view('grant::admin.infrastructure.edit', compact('infrastructure'));
    }

    public function update(UpdateInfrastructureRequest $request, Infrastructure $infrastructure)
    {
        $this->checkAuthorization('infrastructure_edit');
        $infrastructure->update($request->validated());

        toast('पूर्वाधार शीर्षक सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.infrastructure.index'));
    }

    public function destroy(Infrastructure $infrastructure)
    {
        $this->checkAuthorization('infrastructure_delete');

        $infrastructure->delete();

        toast('पूर्वाधार शीर्षक सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
