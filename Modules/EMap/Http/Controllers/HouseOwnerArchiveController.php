<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\File;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\HouseOwner;
use Modules\EMap\Entities\HouseOwnerArchive;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\EMap\Http\Requests\HouseOwnerArchive\StoreHouseOwnerArchiveRequest;
use Modules\EMap\Http\Requests\HouseOwnerArchive\UpdateHouseOwnerArchiveRequest;
use Modules\EMap\Traits\TemplateTrait;

class HouseOwnerArchiveController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;

    public function index(MapApply $mapApply)
    {
        $mapApply->load('houseOwnerArchives');
        $allDistricts = District::all();
        $houseOwnerArchives = HouseOwnerArchive::latest()->where('map_apply_id', $mapApply->id)->get();
        return view('emap::admin.houseOwnerArchive.index', compact('mapApply', 'allDistricts', 'houseOwnerArchives'));
    }

    public function create(MapApply $mapApply)
    {
        return view('emap::create');
    }

    public function store(StoreHouseOwnerArchiveRequest $request, MapApply $mapApply)
    {
        $houseOwner = HouseOwner::where('map_apply_id', $mapApply->id)->first();
        DB::transaction(function () use ($houseOwner, $request, $mapApply) {
            $houseOwnerArchive = HouseOwnerArchive::create([
                'map_apply_id' => $mapApply->id,
                'name' => $houseOwner->name,
                'phone' => $houseOwner->phone,
                'father_name' => $houseOwner->father_name,
                'grandfather_name' => $houseOwner->grandfather_name,
                'citizenship_issue_district_id' => $houseOwner->citizenship_issue_district_id,
                'citizenship_no' => $houseOwner->citizenship_no,
                'citizenship_issue_date' => $houseOwner->citizenship_issue_date,
                'address' => $houseOwner->address,
                'local_body' => $houseOwner->local_body,
                'ward_no' => $houseOwner->ward_no,
                'status' => $mapApply->sent_to_organization === 'done' ? 'complete' : 'not_complete',
            ]);

            $houseOwnerFiles = File::where('model_type', HouseOwner::class)
                ->where('model_id', $houseOwner->id)
                ->get();

            if ($houseOwnerFiles->isNotEmpty()) {
                foreach ($houseOwnerFiles as $houseOwnerFile) {
                    $houseOwnerFile->update([
                        'model_type' => HouseOwnerArchive::class,
                        'model_id' => $houseOwnerArchive->id
                    ]);
                }
            }
            $houseOwner->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'father_name' => $request->input('father_name'),
                'grandfather_name' => $request->input('grandfather_name'),
                'citizenship_issue_district_id' => $request->input('citizenship_issue_district_id'),
                'citizenship_no' => $request->input('citizenship_no'),
                'citizenship_issue_date' => $request->input('citizenship_issue_date'),
                'address' => $request->input('address'),
                'local_body' => $request->input('local_body'),
                'ward_no' => $request->input('ward_no'),
                'status' => $mapApply->sent_to_organization === 'done' ? 'complete' : 'not_complete',
            ]);

            foreach ($request->validated()['files'] as $file) {
                $extension = $file['file']->getClientOriginalExtension();
                $houseOwner->files()->create([
                    'file_name' => $file['file_name'],
                    'extension' => $extension,
                    'file' => $file['file']->store('houseOwner', 'public'),
                ]);
            }
        });

        toast('New House Owner Updated Successfully', 'success');
        return back();
    }

    public function documentDetail(MapApply $mapApply)
    {
        $mapApply->load('houseOwner.files');
        return view('emap::admin.houseOwnerArchive.showDetail', compact('mapApply'));
    }

    public function show(MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {
        $houseOwnerArchive->load('files');
        return view('emap::admin.houseOwnerArchive.show', compact('houseOwnerArchive', 'mapApply'));
    }

    public function edit(MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {
        return view('emap::edit');
    }

    public function update(UpdateHouseOwnerArchiveRequest $request, MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {
        //
    }

    public function destroy(MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {
        //
    }

    public function print(MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {
        if ($mapApply->sent_to_organization === 'done') {
            $mapSetting = MapSetting::first()?->muchulka_after_complietion ?? null;
        } else {
            $mapSetting = MapSetting::first()?->muchulka_before_complietion ?? null;
        }
        $mapApply->load(
            'landDetail',
            'landOwner',
            'houseOwner',
            'fourForts',
            'applicantDetail.citizenshipIssueDistrict',
            'criteriaDetails',
            'buildingDetails',
            'designerDetails'
        );
        $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply, $houseOwnerArchive), $mapSetting);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    public function uploadDocument(Request $request, MapApply $mapApply, HouseOwnerArchive $houseOwnerArchive)
    {

        $data = $request->validate([
            'document' => ['required', 'file']
        ]);
        $houseOwnerArchive->update($data);
        toast('Document added Successfully', 'success');
        return back();
    }

    public function uploadDocumentHouseOwner(Request $request, MapApply $mapApply, HouseOwner $houseOwner)
    {

        $data = $request->validate([
            'document' => ['required', 'file']
        ]);
        $houseOwner->update($data);
        toast('Document added Successfully', 'success');
        return back();
    }

    public function printHouseOwner(MapApply $mapApply, HouseOwner $houseOwner)
    {
        if ($mapApply->sent_to_organization === 'done') {
            $mapSetting = MapSetting::first()?->muchulka_after_complietion ?? null;
        } else {
            $mapSetting = MapSetting::first()?->muchulka_before_complietion ?? null;
        }
        $mapApply->load(
            'landDetail',
            'landOwner',
            'houseOwner',
            'fourForts',
            'applicantDetail.citizenshipIssueDistrict',
            'criteriaDetails',
            'buildingDetails',
            'designerDetails'
        );
        $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $mapSetting);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);

    }
}

