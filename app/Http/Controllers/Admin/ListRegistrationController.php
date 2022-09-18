<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListRegistration\StoreListRegistrationRequest;
use App\Http\Requests\ListRegistration\UpdateListRegistrationRequest;
use App\Models\ListRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ListRegistrationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listRegistration_access'),
            403,
            'You are not allowed to list registration access'
        );

        $listRegistrations = ListRegistration::latest()->get();

        return view('admin.list_registration.index', compact('listRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('listRegistration_create'),
            403,
            'You are not allowed to list registration create'
        );
        $registration_no = 'R-' . Str::padLeft(DB::table('list_registrations')->max('id') + 1, 2, 0);

        return view('admin.list_registration.create', compact('registration_no'));
    }

    public function store(StoreListRegistrationRequest $request)
    {
        abort_if(Gate::denies('listRegistration_create'),
            403,
            'You are not allowed to list registration create'
        );

        DB::transaction(function () use ($request) {
            $listRegistration = ListRegistration::create($request->validated());

            if (!empty($request->validated()['files'])) {
                $this->uploadDocuments($request, $listRegistration);
            }
        });

        toast('मौजुदा सुची दर्ता सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_access'),
            403,
            'You are not allowed to list registration access'
        );
    }

    public function edit(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_edit'),
            403,
            'You are not allowed to list registration edit'
        );

        return view('admin.list_registration.edit', compact('listRegistration'));
    }

    public function update(UpdateListRegistrationRequest $request, ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_edit'),
            403,
            'You are not allowed to list registration edit'
        );

        $listRegistration->update($request->validated());

        toast('मौजुदा सुची दर्ता सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.listRegistrations.listRegistration.index'));
    }

    public function destroy(ListRegistration $listRegistration)
    {
        abort_if(Gate::denies('listRegistration_delete'),
            403,
            'You are not allowed to list registration delete'
        );
    }

    private function uploadDocuments($request, $listRegistration)
    {
        foreach ($request->validated()['files'] as $file) {
            $listRegistration->files()->create([
                'file_name' => $file['file_name'] ?? pathinfo($file['file']->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $file['file']->getClientOriginalExtension(),
                'file' => $file['file']->store('list_registration/' . Str::slug($listRegistration->main_person, '_') . '/files', 'public')
            ]);
        }
    }
}
