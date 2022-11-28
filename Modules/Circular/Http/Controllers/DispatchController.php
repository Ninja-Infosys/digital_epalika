<?php

namespace Modules\Circular\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
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
        $this->checkAuthorization('dispatch_access');

        $dispatches = Dispatch::latest()->get();

        return view('circular::admin.dispatch.index', compact('dispatches'));
    }

    public function create()
    {
        $this->checkAuthorization('dispatch_create');
        $dispatch_no = 'D-'.Str::padLeft(DB::table('dispatches')->max('id') + 1, 2, 0);

        return view('circular::admin.dispatch.create', compact('dispatch_no'));
    }

    public function store(StoreDispatchRequest $request)
    {
        $this->checkAuthorization('dispatch_create');

        DB::transaction(function () use ($request) {
            $dispatch = Dispatch::create($request->validated() + [
                'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
            ]);

            $this->uploadDocuments($request, $dispatch);
        });

        toast('चलानी सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Dispatch $dispatch)
    {
        $this->checkAuthorization('dispatch_access');
        $dispatch->load('fiscalYear', 'files');

        return view('circular::admin.dispatch.show', compact('dispatch'));
    }

    public function edit(Dispatch $dispatch)
    {
        $this->checkAuthorization('dispatch_edit');

        return view('circular::admin.dispatch.edit', compact('dispatch'));
    }

    public function update(UpdateDispatchRequest $request, Dispatch $dispatch)
    {
        $this->checkAuthorization('dispatch_edit');

        DB::transaction(function () use ($request, $dispatch) {
            if ($request->hasFile('receiver_signature') && $dispatch->receiver_signature) {
                $this->deleteFile($dispatch->receiver_signature);
            }

            $dispatch->update($request->validated());

            if ($request->hasFile('documents')) {
                $this->uploadDocuments($request, $dispatch);
            }
        });

        toast('चलानी सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.circular.dispatch.index'));
    }

    public function destroy(Dispatch $dispatch)
    {
        $this->checkAuthorization('dispatch_delete');
        foreach ($dispatch->files as $file) {
            $this->deleteFile($file->file);
        }
        $dispatch->files()->delete();

        if ($dispatch->receiver_signature) {
            $this->deleteFile($dispatch->receiver_signature);
        }
        $dispatch->delete();

        toast('चलानी सफलतापूर्वक मेटियो', 'success');

        return back();
    }

    public function dispatchReport()
    {
        return view('circular::admin.dispatch.report');
    }

    private function uploadDocuments($request, $dispatch)
    {
        foreach ($request->validated()['documents'] as $document) {
            $dispatch->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('dispatch/'.Str::slug($dispatch->receiver_name, '_').'/documents', 'public'),
            ]);
        }
    }
}
