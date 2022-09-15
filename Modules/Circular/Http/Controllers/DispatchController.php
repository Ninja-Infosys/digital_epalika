<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\Circular\Entities\Dispatch;
use Modules\Circular\Http\Requests\Dispatch\StoreDispatchRequest;
use Modules\Circular\Http\Requests\Dispatch\UpdateDispatchRequest;

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

        DB::transaction(function () use ($request) {
            $dispatch = Dispatch::create($request->validated());

            $this->uploadDocuments($request, $dispatch);
        });

        toast('Dispatch Added Successfully', 'success');
        return back();
    }

    public function show(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_access'),
            403,
            'You are not allowed to dispatch access'
        );
        $dispatch->load('circularDocuments');

        return view('circular::dispatch.show', compact('dispatch'));
    }

    public function edit(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_edit'),
            403,
            'You are not allowed to dispatch edit'
        );

        return view('circular::dispatch.edit', compact('dispatch'));
    }

    public function update(UpdateDispatchRequest $request, Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_edit'),
            403,
            'You are not allowed to dispatch edit'
        );

        DB::transaction(function () use ($request, $dispatch) {
            if ($request->hasFile('receiver_signature') && $dispatch->receiver_signature) {
                $this->deleteFile($dispatch->receiver_signature);
            }

            $dispatch->update($request->validated());

            if ($request->hasFile('documents')) {
                $this->uploadDocuments($request, $dispatch);
            }
        });

        toast('Dispatch Updated Successfully', 'success');
        return redirect(route('admin.circular.dispatch.index'));
    }

    public function destroy(Dispatch $dispatch)
    {
        abort_if(Gate::denies('dispatch_delete'),
            403,
            'You are not allowed to dispatch delete'
        );
        foreach ($dispatch->circularDocuments as $document) {
            $this->deleteFile($document->file);
        }
        $dispatch->circularDocuments()->delete();

        if ($dispatch->receiver_signature) {
            $this->deleteFile($dispatch->receiver_signature);
        }
        $dispatch->delete();

        toast('Dispatch Deleted Successfully', 'success');

        return back();
    }

    private function uploadDocuments($request, $dispatch)
    {
        foreach ($request->validated()['documents'] as $document) {
            $dispatch->circularDocuments()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('registration/' . Str::slug($dispatch->receiver_name, '_') . '/documents', 'public')
            ]);
        }
    }
}
