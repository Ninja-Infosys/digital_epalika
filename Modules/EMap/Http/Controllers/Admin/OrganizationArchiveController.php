<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Http\Requests\OrganizationArchiveRequest;

class OrganizationArchiveController extends Controller
{
    public function index(MapApply $mapApply)
    {
        $mapApply->load(['organizationArchives' => function ($query) {
            $query->with('organization.organizationDetail')->latest();
        },
            'organization.organizationDetail']);
        $organizations = Organization::with('organizationDetail')->whereNot('id', $mapApply->organization_id)->get();

        return view('emap::admin.organizationArchive.index', compact('mapApply', 'organizations'));
    }

    public function store(OrganizationArchiveRequest $request, MapApply $mapApply)
    {
        DB::transaction(function () use ($request, $mapApply) {

            $mapApply->organizationArchives()->create([
                'organization_id' => $mapApply->organization_id,
                'archive_date_bs' => $request->input('archive_date_bs')
            ]);

            $mapApply->update([
                'organization_id' => $request->input('organization_id')
            ]);

            $newOrganization = Organization::find($request->input('organization_id'));

            foreach ($request->validated()['files'] as $file) {
                $extension = $file['file']->getClientOriginalExtension();
                $newOrganization->files()->create([
                    'file_name' => $file['file_name'],
                    'extension' => $extension,
                    'file' => $file['file']->store('organization', 'public'),
                ]);
            }
        });

        toast('New Organization Updated Successfully', 'success');

        return back();
    }
}
