<?php

namespace Modules\Circular\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
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
        abort_if(
            Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );

        $registrations = Registration::latest()->get();

        return view('circular::admin.registration.index', compact('registrations'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );
        $registration_no = 'R-'.Str::padLeft(DB::table('registrations')->max('id') + 1, 2, 0);

        return view('circular::admin.registration.create', compact('registration_no'));
    }

    public function store(StoreRegistrationRequest $request)
    {
        abort_if(
            Gate::denies('registration_create'),
            403,
            'You are not allowed to registration create'
        );

        DB::transaction(function () use ($request) {
            $registration = Registration::create($request->validated() + [
                'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
            ]);

            $this->uploadDocuments($request, $registration);
        });

        toast('दर्ता सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_access'),
            403,
            'You are not allowed to registration access'
        );
        $registration->load('fiscalYear', 'files');

        return view('circular::admin.registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );

        return view('circular::admin.registration.edit', compact('registration'));
    }

    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        abort_if(
            Gate::denies('registration_edit'),
            403,
            'You are not allowed to registration edit'
        );

        DB::transaction(function () use ($request, $registration) {
            if ($request->hasFile('signature_image') && $registration->signature_image) {
                $this->deleteFile($registration->signature_image);
            }

            $registration->update($request->validated());

            if ($request->hasFile('documents')) {
                $this->uploadDocuments($request, $registration);
            }
        });

        toast('दर्ता सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.circular.registration.index'));
    }

    public function destroy(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_delete'),
            403,
            'You are not allowed to registration delete'
        );
        foreach ($registration->files as $file) {
            $this->deleteFile($file->file);
        }
        $registration->files()->delete();
        if ($registration->signature_image) {
            $this->deleteFile($registration->signature_image);
        }
        $registration->delete();

        toast('दर्ता सफलतापूर्वक मेटियो', 'success');

        return back();
    }

    public function registrationReport()
    {
        return view('circular::admin.registration.report');
    }

    private function uploadDocuments($request, $registration)
    {
        foreach ($request->validated()['documents'] as $document) {
            $registration->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('registration/'.Str::slug($registration->receiver_name, '_').'/documents', 'public'),
            ]);
        }
    }
}
