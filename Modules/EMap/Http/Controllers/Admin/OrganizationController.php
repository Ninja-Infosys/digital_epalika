<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Helper\SMS\AakashSms;
use App\Http\Controllers\Controller;
use App\Mail\OrganizationRegistered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\EMap\Entities\Organization;
use Illuminate\Database\Eloquent\Builder;

class OrganizationController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('organization_access');
        $organizations = Organization::with('organizationDetail.province', 'organizationDetail.district')
            ->withCount(['mapApplies as registeredMap' => function ($q) {
                $q->whereNotNull('registration_no');
            }])->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['email', 'phone', 'name'], request('search'));
                }
            })
            ->latest()->paginate(10);


        return view('emap::admin.organization.index', compact('organizations'));
    }

    public function updateLoginStatus(Request $request, Organization $organization)
    {
        $request->validate([
            'status' => ['required'],
            'comment' => ['required_if:status,==,rejected']
        ]);
        $this->checkAuthorization('organization_edit');

        DB::transaction(function () use ($organization, $request) {
            $organization->update([
                'status' => $request->input('status'),
                'comment' => $request->input('comment') ?? null,
            ]);
            if ($organization->status === 'accepted') {
                $message = "Dear $organization->name , your application has been approved.";
                (new AakashSms())->sendTextSMS($organization->phone, $message);
                // Mail::to($organization->email)->send(new OrganizationRegistered($organization, $url));
            } elseif ($organization->status === 'rejected') {
                $message = "Dear $organization->name, your application in rejected because of $organization->comment.";
                (new AakashSms())->sendTextSMS($organization->phone, $message);
            }
        });

        toast('संगठन स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }

    public function show(Organization $organization)
    {
        $this->checkAuthorization('organization_access');
        $organization->load([
            'userDetail.citizenshipIssuedDistrict',
            'userDetail.permanentLocalBody',
            'userDetail.permanentDistrict',
            'userDetail.permanentProvince',
            'userDetail.temporaryLocalBody',
            'userDetail.temporaryDistrict',
            'userDetail.temporaryProvince',

            'mapApplies' => function ($q) {
                $q->whereNotNull('sent_to_admin_at');
            },
            'mapApplies.fiscalYear',
            'mapApplies.landDetail',
        ]);


        return view('emap::admin.organization.show', compact('organization'));
    }






    public function destroy(Organization $organization)
    {
        $this->checkAuthorization('organization_delete');
        $organization->delete();
        toast(' संगठन सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
