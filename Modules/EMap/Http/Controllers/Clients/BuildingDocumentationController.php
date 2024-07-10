<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use App\Models\User;
use App\Notifications\BuildingApplicationNotification;
use App\Notifications\BuildingStepNotification;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Entities\BuildingTemplateStore;
use Modules\EMap\Traits\TemplateTrait;
use Illuminate\Support\Str;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\RequiredDocument;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FormTypeEnum;

class BuildingDocumentationController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;
    public function index()
    {
        $buildingDocumentations = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody', 'buildingHouseOwner')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['buildingHouseOwner.name', 'submission_no', 'registration_no'], request('search'));
            }
        })->where('organization_id', auth('organization')->user()->id)->latest()
            ->get();


        return view('emap::organization.application-form.index', compact('buildingDocumentations'));
    }

    public function create()
    {
        $allDistricts = District::all();
        $buildingDocumentation = BuildingDocumentation::all();
        return view('emap::organization.application-form.create', compact('buildingDocumentation', 'allDistricts'));
    }

    public function show(BuildingDocumentation $buildingDocumentation)
    {

        return view('emap::organization.application-form.show', compact('buildingDocumentation'));
    }

    public function edit(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.edit', compact('buildingDocumentation'));
    }
    public function requiredDocument(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('requiredDocument');
        return view('emap::organization.application-form.required-document', compact('buildingDocumentation'));
    }

    public function storeRequiredDocument(Request $request, BuildingDocumentation $buildingDocumentation)
    {

        $requiredDocument = RequiredDocument::where('building_documentation_id', $buildingDocumentation->id)->first() ?? null;
        if (!$requiredDocument) {
            $data = $request->validate([
                'citizenship' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'landowner_proved' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'revenue' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'building_map' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'land_map' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'all_round_house_pic' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],

            ]);
        } else {
            $data = $request->validate([
                'citizenship' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'landowner_proved' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'revenue' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'building_map' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'land_map' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'all_round_house_pic' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],

            ]);
        }

        if ($request->hasFile('citizenship') && !empty($buildingDocumentation->attachDocument->citizenship)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('citizenship'));
        }

        if ($request->hasFile('landowner_proved') && !empty($buildingDocumentation->attachDocument->landowner_proved)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('landowner_proved'));
        }

        if ($request->hasFile('revenue') && !empty($buildingDocumentation->attachDocument->revenue)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('revenue'));
        }

        if ($request->hasFile('building_map') && !empty($buildingDocumentation->attachDocument->building_map)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('building_map'));
        }

        if ($request->hasFile('land_map') && !empty($buildingDocumentation->attachDocument->land_map)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('land_map'));
        }

        if ($request->hasFile('all_round_house_pic') && !empty($buildingDocumentation->attachDocument->all_round_house_pic)) {
            $this->deleteFile($buildingDocumentation->attachDocument->getRawOriginal('all_round_house_pic'));
        }


        RequiredDocument::updateOrCreate([
            'building_documentation_id' => $buildingDocumentation->id
        ], $data);
        toast('File added successfully', 'success');
        return back();
    }
    public function updateAdminStatus(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->update([
            'sent_to_admin_at' => empty($buildingDocumentation->sent_to_admin_at) ? now() : null,
        ]);

        Notification::send(User::all(), new BuildingApplicationNotification($buildingDocumentation));
        toast('सफलता पुर्बक अद्यावधिक गरियो', 'success');
        return back();
    }


    public function destroy(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->delete();
        toast('भवन अभिलेखीकरण दर्खास्त सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
