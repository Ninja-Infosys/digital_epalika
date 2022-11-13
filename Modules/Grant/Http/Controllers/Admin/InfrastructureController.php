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
        abort_if(Gate::denies('infrastructure_access'),
            403,
            'You are not allowed to access this resource'
        );

        $infrastructures = Infrastructure::all();

        return view('grant::admin.infrastructure.index', compact('infrastructures'));
    }

    public function create()
    {
        abort_if(Gate::denies('infrastructure_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::admin.infrastructure.create');
    }

    public function store(StoreInfrastructureRequest $request)
    {
        abort_if(Gate::denies('infrastructure_create'),
            403,
            'You are not allowed to access this resource'
        );

        Infrastructure::create($request->validated());

        toast('पूर्वाधार शीर्षक सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::show');
    }

    public function edit(Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::admin.infrastructure.edit', compact('infrastructure'));
    }

    public function update(UpdateInfrastructureRequest $request, Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $infrastructure->update($request->validated());

        toast('पूर्वाधार शीर्षक सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.infrastructure.index'));
    }

    public function destroy(Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $infrastructure->delete();

        toast('पूर्वाधार शीर्षक सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
