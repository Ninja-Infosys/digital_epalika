<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
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
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FormTypeEnum;

class BuildingDocumentationController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;
    public function index()
    {
        $buildingDocumentations = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody','buildingHouseOwner')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['buildingHouseOwner.name', 'submission_no', 'registration_no'], request('search'));
            }


        }) ->where('organization_id', auth('organization')->user()->id)->latest()
        ->get();

        //     $mapApplies = MapApply::with('houseOwner')
        //     ->where('organization_id', auth('organization')->user()->id)
        //     ->latest()
        //     ->get();

        // return view('emap::organization.map-applies.index', compact('mapApplies'));

        return view('emap::organization.application-form.index', compact('buildingDocumentations'));
    }

    public function create()
    {
        $allDistricts = District::all();
        $buildingDocumentation = BuildingDocumentation::all();
        return view('emap::organization.application-form.create', compact('buildingDocumentation','allDistricts'));
    }

    public function show(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.show', compact('buildingDocumentation'));
    }

    public function edit(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.edit', compact('buildingDocumentation'));
    }


}
