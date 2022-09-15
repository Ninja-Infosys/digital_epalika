<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\Circular\Entities\Registration;
use Modules\Circular\Http\Requests\Registration\StoreRegistrationRequest;
use Modules\Circular\Http\Requests\Registration\UpdateRegistrationRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );

        $registrations = Registration::latest()->get();

        return view('circular::registration.index', compact('registrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );

        return view('circular::registration.create');
    }

    public function store(StoreRegistrationRequest $request)
    {
        abort_if(Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );

        DB::transaction(function () use ($request) {
            $registration = Registration::create($request->validated());

            $this->uploadDocuments($request, $registration);
        });

        toast('Registration Added Successfully', 'success');

        return back();
    }

    public function show(Registration $registration)
    {
        abort_if(Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );
        $registration->load('circularDocuments');

        return view('circular::registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        abort_if(Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );

        return view('circular::registration.edit', compact('registration'));
    }

    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        abort_if(Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );

        DB::transaction(function () use ($request, $registration) {

            if ($request->hasFile('signature_image') && $registration->signature_image) {
                $this->deleteFile($registration->signature_image);
            }

            $registration->update($request->validated());

            $this->uploadDocuments($request, $registration);
        });

        toast('Registration Updated Successfully', 'success');

        return redirect(route('admin.circular.registration.index'));
    }

    public function destroy(Registration $registration)
    {
        abort_if(Gate::denies('registration_delete'),
            403,
            'You are not allowed to registration delete'
        );
        foreach ($registration->circularDocuments as $circularDocument) {
            $this->deleteFile($circularDocument->file);
        }
        $registration->circularDocuments()->delete();
        if ($registration->signature_image) {
            $this->deleteFile($registration->signature_image);
        }
        $registration->delete();

        toast('Registration Deleted Successfully', 'success');

        return back();

    }

    private function uploadDocuments($request, $registration)
    {
        foreach ($request->validated()['circularDocuments'] as $circularDocument) {
            $registration->circularDocuments()->create([
                'file_name' => pathinfo($circularDocument, PATHINFO_FILENAME),
                'extension' => pathinfo($circularDocument, PATHINFO_EXTENSION),
                'file' => $circularDocument->store('registration/' . Str::slug($registration->receiver_name, '_') . '/documents', 'public')
            ]);
        }
    }
}
