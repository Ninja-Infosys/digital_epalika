<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Http\Requests\Dispatch\StoreDispatchRequest;

class DispatchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispatch_access'),
            403,
            'You are not allowed to dispatch access'
        );

        $dispatches = Dispatch::latest()->get();

        return view('circular::dispatch.index', compact('dispatches'));
    }

    public function create()
    {
        abort_if(Gate::denies('dispatch_create'),
            403,
            'You are not allowed to dispatch create'
        );

        return view('circular::dispatch.create');
    }

    public function store(StoreDispatchRequest $request)
    {
        abort_if(Gate::denies('dispatch_create'),
            403,
            'You are not allowed to dispatch create'
        );
    }

    public function show(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_access'),
            403,
            'You are not allowed to dispatch access'
        );

        return view('circular::dispatch.show');
    }

    public function edit(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_edit'),
            403,
            'You are not allowed to dispatch edit'
        );

        return view('circular::dispatch.edit');
    }

    public function update(Request $request, Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_edit'),
            403,
            'You are not allowed to dispatch edit'
        );
    }

    public function destroy(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_delete'),
            403,
            'You are not allowed to dispatch delete'
        );
    }
}
