<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\GrievanceHandling\Entities\GrievanceDetail;
use Illuminate\Database\Eloquent\Builder;

class GrievanceDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grievanceDetail_access');

        $grievanceDetails = GrievanceDetail::with('grievanceType')->whereNull('grievance_detail_id')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['token','grievanceType.title',], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('grievancehandling::admin.grievanceDetail.index', compact('grievanceDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('grievanceDetail_create');

        return view('grievancehandling::create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('grievanceDetail_create');
    }

    public function show(GrievanceDetail $grievanceDetail)
    {
        $this->checkAuthorization('grievanceDetail_access');

        $grievanceDetail->load(
            'grievanceDetails.files',
            'grievanceDetails.user',
            'grievanceDetails.grievanceUser',
            'grievanceType',
            'grievanceOffice',
            'files'
        );
        return view('grievancehandling::admin.grievanceDetail.show', compact('grievanceDetail'));
    }

    public function edit($id)
    {
        $this->checkAuthorization('grievanceDetail_edit');

        return view('grievancehandling::edit');
    }

    public function update(Request $request, $id)
    {
        $this->checkAuthorization('grievanceDetail_edit');
    }

    public function destroy($id)
    {
        $this->checkAuthorization('grievanceDetail_delete');
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

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $data->files()->create([
                        'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                        'extension' => $file->getClientOriginalExtension(),
                        'file' => $file->store('grievanceDocument/documents', 'public'),
                    ]);
                }
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
