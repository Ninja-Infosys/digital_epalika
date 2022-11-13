<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\GrievanceHandling\Entities\GrievanceDetail;

class GrievanceDetailController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('grievanceDetail_access'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceDetails = GrievanceDetail::with('grievanceType')->whereNull('grievance_detail_id')->latest()->paginate(10);

        return view('grievancehandling::admin.grievanceDetail.index', compact('grievanceDetails'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('grievanceDetail_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grievancehandling::create');
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('grievanceDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function show(GrievanceDetail $grievanceDetail)
    {
        abort_if(
            Gate::denies('grievanceDetail_access'),
            403,
            'You are not allowed to access this resource'
        );
        $grievanceDetail->load(
            'grievanceDetails',
            'grievanceType',
            'grievanceOffice',
            'files'
        );

        return view('grievancehandling::admin.grievanceDetail.show', compact('grievanceDetail'));
    }

    public function edit($id)
    {
        abort_if(
            Gate::denies('grievanceDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grievancehandling::edit');
    }

    public function update(Request $request, $id)
    {
        abort_if(
            Gate::denies('grievanceDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy($id)
    {
        abort_if(
            Gate::denies('grievanceDetail_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function updateStatus(Request $request, GrievanceDetail $grievanceDetail): RedirectResponse
    {
        $grievanceDetail->update([
            'status' => $request->input('status'),
        ]);
        toast('स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function replayGrievance(Request $request, GrievanceDetail $grievanceDetail): RedirectResponse
    {
        $validated = $request->validate([
            'description' => ['required'],
            'files.*' => ['mimes:png,jpeg,jpg'],
            'files' => ['array', 'nullable'],
        ]);

        DB::transaction(function () use ($request, $validated, $grievanceDetail) {
            $data = $grievanceDetail->grievanceDetails()->create($validated + [
                'user_id' => auth()->id(),
            ]);

            foreach ($request->file('files') as $file) {
                $data->files()->create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'extension' => $file->getClientOriginalExtension(),
                    'file' => $file->store('grievanceDocument/documents', 'public'),
                ]);
            }
        });

        toast('सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function showToPublic(GrievanceDetail $grievanceDetail): RedirectResponse
    {
        $grievanceDetail->update(['is_public' => ! $grievanceDetail->is_public]);
        toast('सफलतापूर्वक सार्वजनिक गरियो', 'success');

        return back();
    }

    public function approve(GrievanceDetail $grievanceDetail): RedirectResponse
    {
        $grievanceDetail->update(['is_approved' => ! $grievanceDetail->is_approved]);
        toast('सफलतापूर्वक दर्ता गरियो', 'success');

        return back();
    }
}
