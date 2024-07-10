<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Enums\BuildingDocumentationStatusEnum;
use Modules\EMap\Enums\MapStatusEnum;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\BuildingTemplateStore;
use Modules\EMap\Entities\RequiredDocument;
use Modules\EMap\Traits\TemplateTrait;

class BuildingDocumentationController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;

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

    public function printTemplate(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    public function getPrintData(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType): string
    {
        $buildingTemplateStore = BuildingTemplateStore::where('building_documentation_id', $buildingDocumentation->id)
            ->where('building_documentation_step_id', $form->id)
            ->where('building_form_data_type_id', $buildingFormDataType->id)
            ->first()?->data ?? null;

        $buildingFormDataType->load('model');
        $buildingDocumentation->load(
            'buildingStoreyDetails',
            'neighbours',
            'files',
            'localBody',
            'district',
            'province',
            'fiscalYear',
            'requiredDocument',
        );
        return $buildingTemplateStore ?? Str::replace($this->getReplaceData(), $this->getBuildingTemplateData($buildingDocumentation), $buildingFormDataType->model?->data);
    }

    public function editTemplate(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);

        return view('emap::admin.template-edit.template-edit', compact('buildingDocumentation', 'data', 'buildingFormDataType', 'form'));
    }

    public function storeFileTemplate(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $request->validate([
            'data' => ['required'],
        ]);
        BuildingTemplateStore::updateOrCreate([
            'building_documentation_id' => $buildingDocumentation->id,
            'building_documentation_step_id' => $form->id,
            'building_form_data_type_id' => $buildingFormDataType->id,
        ], ['data' => $request->input('data')]);
        toast('टेम्प्लेट विवरण सम्पादन सफलतापूर्वक गरियो', 'success');

        return redirect(route('emap.admin.buildingDocumentation.admin-step.formDetail', [$buildingDocumentation, $form]));
    }
    public function updateDocumentStatus(Request $request, BuildingDocumentation $buildingDocumentation)
    {
        if ($request->input('citizenship_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'citizenship_status' => $request->input('citizenship_status')
            ]);
        } elseif ($request->input('landowner_proved_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'landowner_proved_status' => $request->input('landowner_proved_status')
            ]);
        } elseif ($request->input('revenue_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'revenue_status' => $request->input('revenue_status')
            ]);
        } elseif ($request->input('building_map_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'building_map_status' => $request->input('building_map_status')
            ]);
        } elseif ($request->input('land_map_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'land_map_status' => $request->input('land_map_status')
            ]);
        } elseif ($request->input('all_round_house_pic_status')) {
            RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->update([
                'all_round_house_pic_status' => $request->input('all_round_house_pic_status')
            ]);
        }
        toast(' सफलता पुर्बक आवधिक गरियो', 'success');
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
