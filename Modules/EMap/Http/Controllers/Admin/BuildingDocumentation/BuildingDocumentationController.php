<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Enums\BuildingDocumentationStatusEnum;
use Modules\EMap\Enums\MapStatusEnum;

class BuildingDocumentationController extends Controller
{
    use NepaliDateConverter;

    public function index($mapStatusEnum = 'all')
    {
        $this->checkAuthorization('buildingDocumentationApplication_access');

        $buildingsQuery = BuildingDocumentation::with([
                'fiscalYear',
                'organization:id,name',
                'applyBuildingNotices',
                'buildingLandOwner',
                'buildingHouseOwner',

            ])
            ->sentToAdmin()
            ->when(MapStatusEnum::getAllValues()->contains($mapStatusEnum), function ($q) use ($mapStatusEnum) {
                $q->where('sent_to_organization', $mapStatusEnum);
            });

        // Check for the Super Admin role
        $user = auth()->user();
        if ($user->role->type != 'Super') {
            $buildingsQuery->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'submission_no', 'buildingHouseOwner.name', 'organization.name'], request('search'));
                }
            })
            ->when(!empty($user->ward_no), function (Builder $q) use ($user) {
                $q->where('land_ward_no', $user->ward_no);
            })
            ->when(empty($user->ward_no), function (Builder $q) use ($user) {
                $mapGroups = DB::table('map_pass_group_user')->where('user_id', $user->id)->first();
                if ($mapGroups) {
                    $ward_no = explode(',', $mapGroups->ward_no);
                    $q->whereIn('land_ward_no', $ward_no);
                }
            });
        }

        $buildingDocumentations = $buildingsQuery->orderBy('updated_at', 'desc')->paginate(10);

        return view('emap::admin.buildingDocumentation.application.index', compact('buildingDocumentations', 'mapStatusEnum'));
    }


    public function edit(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('neighbours', 'files', 'requiredDocument');

        return view('emap::admin.buildingDocumentation.application.edit', compact('buildingDocumentation'));
    }



    public function show(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load(
            'neighbours',
            'buildingStoreyDetails',
            'requiredDocument',
            'files'

        );

        return view('emap::admin.buildingDocumentation.application.show', compact('buildingDocumentation'));
    }

    public function customData(Request $request, BuildingDocumentation $buildingDocumentation)
    {

        $data = $request->validate([
            'bill_no' => ['required'],
            'bill_date_bs' => ['required'],
            'bill_date_ad' => ['required'],
            'other_file' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'amount' => ['required'],
            'taxpayer_number' => ['nullable'],
        ]);

        DB::transaction(function () use ($buildingDocumentation, $data) {
            if (empty($buildingDocumentation->registration_no)) {
                $reg_no = BuildingDocumentation::whereFiscalYearId(\officeSetting()->fiscal_year_id)
                    ->max('reg_no') + 1;
                $data = array_merge($data, [
                    'reg_no' => $reg_no,
                    'fiscal_year_id' => \officeSetting()->fiscal_year_id,
                    'registration_no' => 'FR-' . officeSetting()->fiscalYear?->title . '-' . Str::padLeft($reg_no, 4, 0),
                    'registration_date_en' => today()->toDateString(),
                    'registration_date_ne' => $this->get_today_nepali_date(),
                    'status' => BuildingDocumentationStatusEnum::NOTICE->value,
                ]);
            }

            $buildingDocumentation->update($data);
        });
        toast('दस्तुर सफलतापूर्वक थपियो', 'success');

        return redirect()->route('emap.admin.buildingDocumentation.printNotice', $buildingDocumentation->id);
    }

    public function printNotice(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load([
            'neighbours',
        ]);

        return view('emap::admin.buildingDocumentation.template.notice', compact('buildingDocumentation'));
    }

    public function printLandConfirmation(BuildingDocumentation $buildingDocumentation)
    {

        if (!is_null(auth()->user()->ward_no)) {
            $buildingDocumentation->update([
                'status' => BuildingDocumentationStatusEnum::LAND_CONFIRMATION->value,
            ]);
            $buildingDocumentation->load([
                'neighbours',
            ]);
        }

        return view('emap::admin.buildingDocumentation.template.landConfirmation', compact('buildingDocumentation'));
    }

    public function printRecommendation(BuildingDocumentation $buildingDocumentation)
    {
        if (!is_null(auth()->user()->ward_no)) {
            $buildingDocumentation->update([
                'status' => BuildingDocumentationStatusEnum::RECOMMENDATION->value,
            ]);
            $buildingDocumentation->load([
                'neighbours',
            ]);
        }

        return view('emap::admin.buildingDocumentation.template.recommendation', compact('buildingDocumentation'));
    }

    public function printCertificate(BuildingDocumentation $buildingDocumentation)
    {
        if (is_null(auth()->user()->ward_no)) {
            $buildingDocumentation->update([
                'status' => BuildingDocumentationStatusEnum::CERTIFICATE->value,
            ]);
            $buildingDocumentation->load([
                'neighbours',
            ]);
        }

        return view('emap::admin.buildingDocumentation.template.certificate', compact('buildingDocumentation'));
    }

    public function sentToAdmin(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->update([
            'sent_admin' => 'recommendation_sent',
        ]);
        return back();
    }

    public function showToAdmin(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->update([
            'sent_admin' => 'land_confirmation_show',
        ]);
        $buildingDocumentation->load([
            'neighbours',
        ]);
        return back();
    }

    public function printPermission(BuildingDocumentation $buildingDocumentation)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $buildingDocumentation->update([
            'status' => BuildingDocumentationStatusEnum::RECOMMENDATION->value,
        ]);
        $buildingDocumentation->load([
            'neighbours',
        ]);

        return view('emap::admin.buildingDocumentation.template.permission', compact('buildingDocumentation', 'currentDateTime'));
    }

    public function printConfession(BuildingDocumentation $buildingDocumentation)
    {

        $buildingDocumentation->update([
            'status' => BuildingDocumentationStatusEnum::RECOMMENDATION->value,
        ]);
        $buildingDocumentation->load([
            'neighbours',
        ]);

        return view('emap::admin.buildingDocumentation.template.confession', compact('buildingDocumentation', 'currentDateTime'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
