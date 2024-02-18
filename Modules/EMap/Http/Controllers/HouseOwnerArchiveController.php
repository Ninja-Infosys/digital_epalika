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

class HouseOwnerArchiveController extends Controller
{
    use NepaliDateConverter;
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
            $houseOwnerArchive =  HouseOwnerArchive::create([
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
                'status'=> $mapApply->sent_to_organization === 'done' ? 'complete':'not_complete',
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
                'status'=> $mapApply->sent_to_organization === 'done' ? 'complete':'not_complete',
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
        return view('emap::admin.houseOwnerArchive.show',compact('houseOwnerArchive','mapApply'));
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

    public function print(MapApply $mapApply,HouseOwnerArchive $houseOwnerArchive)
    {
        if($mapApply->sent_to_organization === 'done')
        {
            $mapSetting = MapSetting::first()?->muchulka_after_complietion??null;
        }else{
            $mapSetting = MapSetting::first()?->muchulka_before_complietion??null;
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
        $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply,$houseOwnerArchive), $mapSetting);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    protected function getEmapTemplateData($mapApply,$houseOwnerArchive=null)
    {
        $designerDetail = $mapApply->designerDetails->where('post', PostsEnum::DESIGNER)->first();
        $supervisorDetail = $mapApply->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();
        $contractorDetail = $mapApply->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [

            //header
            letterHead(),
            letterHeadEn(),
            get_nepali_number($this->get_today_nepali_date()),

            //mapApply
            $mapApply->registration_no ?? '',
            $mapApply->registration_date ?? '',
            $mapApply->construction_type?->label() ?? '',
            $mapApply->usage?->label() ?? '',
            $mapApply->building_category?->label() ?? '',
            $mapApply->structureType->title ?? '',
            $mapApply->current_storey ?? '',
            $mapApply->future_storey ?? '',
            $mapApply->area_of_plinth ?? '',
            $mapApply->length ?? '',
            $mapApply->breadth ?? '',
            $mapApply->height ?? '',
            //landDetail
            $mapApply->landDetail?->landUseArea?->title ?? '',
            $mapApply->landDetail->ward_no ?? '',
            $mapApply->landDetail->former_ward_no ?? '',
            $mapApply->landDetail->tole ?? '',
            $mapApply->landDetail->street_code_no ?? '',
            $mapApply->landDetail->plot_no ?? '',
            $mapApply->landDetail->area ?? '',
            $mapApply->landDetail->percentage_of_area_covered_by_building ?? '',

            //landowner

            $mapApply->landOwner->land_owner_type?->label() ?? '',
            $mapApply->landOwner->name ?? '',
            $mapApply->landOwner->phone ?? '',
            $mapApply->landOwner->father_name ?? '',
            $mapApply->landOwner->grandfather_name ?? '',
            $mapApply->landOwner->citizenshipIssueDistrict->district ?? '',
            $mapApply->landOwner->citizenship_no ?? '',
            $mapApply->landOwner->citizenship_issue_date ?? '',
            $mapApply->landOwner->address ?? '',
            $mapApply->landOwner->local_body ?? '',
            $mapApply->landOwner->ward_no ?? '',

            //houseOwner



            !empty($houseOwnerArchive) ? $houseOwnerArchive->name : $mapApply->houseOwner->name ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->phone : $mapApply->houseOwner->phone ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->father_name : $mapApply->houseOwner->father_name ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->grandfather_name : $mapApply->houseOwner->grandfather_name ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->citizenshipIssueDistrict->district : $mapApply->houseOwner->citizenshipIssueDistrict->district ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->citizenship_no : $mapApply->houseOwner->citizenship_no ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->citizenship_issue_date : $mapApply->houseOwner->citizenship_issue_date ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->address : $mapApply->houseOwner->address ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->local_body : $mapApply->houseOwner->local_body ?? '',
           !empty($houseOwnerArchive)? $houseOwnerArchive->ward_no : $mapApply->houseOwner->ward_no ?? '',

            //FourForts
            (string)View::make('emap::inc.four_forts_table', [
                'fourForts' => $mapApply->fourForts,
            ]),
            (string)View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $mapApply->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            //applicantDetail
            $mapApply->applicantDetail->applicant_type?->label() ?? '',
            $mapApply->applicantDetail->relation_with_owner?->label() ?? '',
            $mapApply->applicantDetail->name ?? '',
            $mapApply->applicantDetail->phone ?? '',
            $mapApply->applicantDetail->father_name ?? '',
            $mapApply->applicantDetail->citizenshipIssueDistrict->district ?? '',
            $mapApply->applicantDetail->citizenship_no ?? '',
            $mapApply->applicantDetail->citizenship_issue_date ?? '',
            $mapApply->applicantDetail->signature_url ?? '',

            //criteria detail

            (string)View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $mapApply->criteriaDetails,
            ]),
            //BuildingDetails

            (string)View::make('emap::inc.building_details', [
                'buildingDetails' => $mapApply->buildingDetails,
            ]),

            //DesignerDetails

            $designerDetail->name ?? '',
            $designerDetail->father_name ?? '',
            $designerDetail->phone ?? '',
            $designerDetail->address ?? '',
            $designerDetail->local_body ?? '',
            $designerDetail->ward_no ?? '',
            $designerDetail->nec_council_no ?? '',
            $designerDetail->local_body_registration_no ?? '',
            $designerDetail->consulting_firm_name ?? '',

            //supervisorDetails

            $supervisorDetail->name ?? '',
            $supervisorDetail->father_name ?? '',
            $supervisorDetail->phone ?? '',
            $supervisorDetail->address ?? '',
            $supervisorDetail->local_body ?? '',
            $supervisorDetail->ward_no ?? '',
            $supervisorDetail->nec_council_no ?? '',
            $supervisorDetail->local_body_registration_no ?? '',
            $supervisorDetail->consulting_firm_name ?? '',

            //ContractorDetails

            $contractorDetail->name ?? '',
            $contractorDetail->father_name ?? '',
            $contractorDetail->phone ?? '',
            $contractorDetail->address ?? '',
            $contractorDetail->local_body ?? '',
            $contractorDetail->ward_no ?? '',
            $contractorDetail->nec_council_no ?? '',
            $contractorDetail->local_body_registration_no ?? '',
            $contractorDetail->consulting_firm_name ?? '',
        ];
    }

    private function getReplaceData()
    {
        return [
            //header

            '[@letterHead]',
            '[@letterHeadEn]',
            '[@today_date]',
            //mapApply

            '[@registration_no]',
            '[@registration_date]',
            '[@construction_type]',
            '[@usage]',
            '[@building_category]',
            '[@structureType]',
            '[@current_storey]',
            '[@future_storey]',
            '[@area_of_plinth]',
            '[@length]',
            '[@breadth]',
            '[@height]',
            //landDetail
            '[@landDetail.land_use_area.title]',
            '[@landDetail.ward_no]',
            '[@landDetail.former_ward_no]',
            '[@landDetail.tole]',
            '[@landDetail.street_code_no]',
            '[@landDetail.plot_no]',
            '[@landDetail.area]',
            '[@landDetail.percentage_of_area_covered_by_building]',

            //landOwner
            '[@landOwner.land_owner_type]',
            '[@landOwner.name]',
            '[@landOwner.phone]',
            '[@landOwner.father_name]',
            '[@landOwner.grandfather_name]',
            '[@landOwner.citizenship_issue_district]',
            '[@landOwner.citizenship_no]',
            '[@landOwner.citizenship_issue_date]',
            '[@landOwner.address]',
            '[@landOwner.local_body]',
            '[@landOwner.ward_no]',

            //houseOwner

            '[@houseOwner.name]',
            '[@houseOwner.phone]',
            '[@houseOwner.father_name]',
            '[@houseOwner.grandfather_name]',
            '[@houseOwner.citizenship_issue_district]',
            '[@houseOwner.citizenship_no]',
            '[@houseOwner.citizenship_issue_date]',
            '[@houseOwner.address]',
            '[@houseOwner.local_body]',
            '[@houseOwner.ward_no]',

            //FourForts

            '[@fourForts]',
            '[@nameOfTheFortsAndSanghiars]',

            //applicantDetail

            '[@applicantDetail.applicant_type]',
            '[@applicantDetail.relation_with_owner]',
            '[@applicantDetail.name]',
            '[@applicantDetail.phone]',
            '[@applicantDetail.father_name]',
            '[@applicantDetail.citizenship_issue_district]',
            '[@applicantDetail.citizenship_no]',
            '[@applicantDetail.citizenship_issue_date]',
            '[@applicantDetail.signature_url]',

            //criteria detail
            '[@criteriaDetails]',

            //BuildingDetails
            '[@buildingDetails]',

            //DesignerDetails
            '[@designerDetail.name]',
            '[@designerDetail.father_name]',
            '[@designerDetail.phone]',
            '[@designerDetail.address]',
            '[@designerDetail.local_body]',
            '[@designerDetail.ward_no]',
            '[@designerDetail.nec_council_no]',
            '[@designerDetail.local_body_registration_no]',
            '[@designerDetail.consulting_firm_name]',

            //supervisorDetails

            '[@supervisorDetail.name]',
            '[@supervisorDetail.father_name]',
            '[@supervisorDetail.phone]',
            '[@supervisorDetail.address]',
            '[@supervisorDetail.local_body]',
            '[@supervisorDetail.ward_no]',
            '[@supervisorDetail.nec_council_no]',
            '[@supervisorDetail.local_body_registration_no]',
            '[@supervisorDetail.consulting_firm_name]',

            //ContractorDetails

            '[@contractorDetail.name]',
            '[@contractorDetail.father_name]',
            '[@contractorDetail.phone]',
            '[@contractorDetail.address]',
            '[@contractorDetail.local_body]',
            '[@contractorDetail.ward_no]',
            '[@contractorDetail.nec_council_no]',
            '[@contractorDetail.local_body_registration_no]',
            '[@contractorDetail.consulting_firm_name]'
        ];
    }

    public function uploadDocument(Request $request,MapApply $mapApply,HouseOwnerArchive $houseOwnerArchive)
    {

        $data = $request->validate([
            'document'=>['required','file']
        ]);
        $houseOwnerArchive->update($data);
        toast('Document added Successfully','success');
        return back();
    }
    public function uploadDocumentHouseOwner(Request $request,MapApply $mapApply,HouseOwner $houseOwner)
    {

        $data = $request->validate([
            'document'=>['required','file']
        ]);
        $houseOwner->update($data);
        toast('Document added Successfully','success');
        return back();
    }

    public function printHouseOwner(MapApply $mapApply,HouseOwner $houseOwner)
    {
        if($mapApply->sent_to_organization === 'done')
        {
            $mapSetting = MapSetting::first()?->muchulka_after_complietion??null;
        }else{
            $mapSetting = MapSetting::first()?->muchulka_before_complietion??null;
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
