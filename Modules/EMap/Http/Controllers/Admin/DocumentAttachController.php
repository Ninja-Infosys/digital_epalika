<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Entities\PaymentStoreStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\AppliedDocumentStatus;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;

class DocumentAttachController extends Controller
{
    public function store(Request $request, MapApply $mapApply, Form $form, FormDataType  $formDataType)
    {
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id
                ]);
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                    'data' => $data['data'],
                    'fields' => $form->fields ?? ''
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['required', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $mapApply->paymentStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }

        return redirect(route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]));
    }


    public function formStoreDetail(FormStore $formStore)
    {
        $formStore->load('formStoreStatuses');
        toast('', 'success');
        return back()->with(compact('formStore'));
    }

    public function printTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {

        $formDataType->load('model');
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
        $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $formDataType->model->data);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    public function update(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, $id)
    {
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $appliedDocument = AppliedDocument::find($id);
                $appliedDocumentStatus = AppliedDocumentStatus::create([
                    "applied_document_id" => $appliedDocument->id,
                    "status" => DocumentStatusEnum::APPROVED->value
                ]);

                foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                    $appliedDocumentStatus->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $existingFile->document,
                    ]);
                    $existingFile->forceDelete();
                }
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $formStore = FormStore::find($id);
                FormStoreStatus::create([
                    "form_store_id" => $formStore->id,
                    "status" => DocumentStatusEnum::APPROVED->value,
                    "data" => $formStore->data,
                    "fields" => $formStore->fields
                ]);
                $formStore->update([
                    'data' => $data['data'],
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['nullable', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $paymentStore = PaymentStore::find($id);
                PaymentStoreStatus::create([
                    "payment_store_id" => $paymentStore->id,
                    "status" => DocumentStatusEnum::APPROVED->value,
                    'bill' => $paymentStore->bill,
                    'amount' => $paymentStore->amount,
                ]);
                $paymentStore->update([
                    'bill' => (array_key_exists('bill', $data) && !empty($data['bill'])) ? $data['bill']->store('appliedDocument', 'public') : $paymentStore->bill,
                    'amount' => $data['amount'],
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]));
    }

    protected function getEmapTemplateData($mapApply)
    {
        $designerDetail = $mapApply->designerDetails->where('post', PostsEnum::DESIGNER)->first();
        $supervisorDetail = $mapApply->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();
        $contractorDetail = $mapApply->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [

            //header
            letterHead(),
            letterHead('letter_head'),
            officeSetting()->name ?? '',
            officeSetting()->site_address ?? '',
            officeSetting()->province?->province ?? '',
            officeSetting()->district?->district ?? '',
            officeSetting()->localBody?->local_body ?? '',
            officeSetting()->ward_no ??'',
            get_nepali_number($this->get_today_nepali_date()),

            //mapApply
            get_nepali_number($mapApply->registration_no) ?? '',
            get_nepali_number($mapApply->registration_date) ?? '',
            get_nepali_number($mapApply->construction_type?->label()) ?? '',
            get_nepali_number($mapApply->usage?->label()) ?? '',
            get_nepali_number($mapApply->building_category?->label()) ?? '',
            get_nepali_number($mapApply->structureType->title) ?? '',
            get_nepali_number($mapApply->current_storey) ?? '',
            get_nepali_number($mapApply->future_storey) ?? '',
            get_nepali_number($mapApply->area_of_plinth) ?? '',
            get_nepali_number($mapApply->length) ?? '',
            get_nepali_number($mapApply->breadth) ?? '',
            get_nepali_number($mapApply->height) ?? '',
            //landDetail
            get_nepali_number($mapApply->landDetail?->landUseArea?->title) ?? '',
            get_nepali_number($mapApply->landDetail->ward_no) ?? '',
            get_nepali_number($mapApply->landDetail->former_ward_no) ?? '',
            get_nepali_number($mapApply->landDetail->tole) ?? '',
            get_nepali_number($mapApply->landDetail->street_code_no) ?? '',
            get_nepali_number($mapApply->landDetail->plot_no) ?? '',
            get_nepali_number($mapApply->landDetail->unit_value) ?? '',
            get_nepali_number($mapApply->landDetail->percentage_of_area_covered_by_building) ?? '',
            get_nepali_number($mapApply->landDetail->former_local_body) ?? '',
            get_nepali_number($mapApply->landDetail->road_name) ?? '',
            //landowner

            // $mapApply->landOwner->land_owner_type->label() ?? '',
            // $mapApply->landOwner->name ?? '',
            // $mapApply->landOwner->phone ?? '',
            // $mapApply->landOwner->father_name ?? '',
            // $mapApply->landOwner->grandfather_name ?? '',
            // $mapApply->landOwner->citizenshipIssueDistrict->district ?? '',
            // $mapApply->landOwner->citizenship_no ?? '',
            // $mapApply->landOwner->citizenship_issue_date ?? '',
            // $mapApply->landOwner->address ?? '',
            // $mapApply->landOwner->local_body ?? '',
            // $mapApply->landOwner->ward_no ?? '',

            //houseOwner

            // $mapApply->houseOwner->name ?? '',
            // $mapApply->houseOwner->phone ?? '',
            // $mapApply->houseOwner->father_name ?? '',
            // $mapApply->houseOwner->grandfather_name ?? '',
            // $mapApply->houseOwner->citizenshipIssueDistrict->district ?? '',
            // $mapApply->houseOwner->citizenship_no ?? '',
            // $mapApply->houseOwner->citizenship_issue_date ?? '',
            // $mapApply->houseOwner->address ?? '',
            // $mapApply->houseOwner->local_body ?? '',
            // $mapApply->houseOwner->ward_no ?? '',

            //FourForts
            (string)View::make('emap::inc.four_forts_table', [
                'fourForts' => $mapApply->fourForts,
            ]),
            (string)View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $mapApply->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            (string)View::make('emap::inc.land_four_forts_detail', [
                'actualSetBack' => $mapApply->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            (string)View::make('emap::inc.sanghiarsName', [
                'towards' => $mapApply->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),

            //applicantDetail
            get_nepali_number($mapApply->applicantDetail->applicant_type->label()) ?? '',
            get_nepali_number($mapApply->applicantDetail->relation_with_owner->label()) ?? '',
            get_nepali_number($mapApply->applicantDetail->name) ?? '',
            get_nepali_number($mapApply->applicantDetail->phone) ?? '',
            get_nepali_number($mapApply->applicantDetail->father_name) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenshipIssueDistrict->district) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenship_no) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenship_issue_date) ?? '',
            get_nepali_number($mapApply->applicantDetail->signature) ?? '',
            get_nepali_number($mapApply->applicantDetail->province?->province) ?? '',
            get_nepali_number($mapApply->applicantDetail->district?->district) ?? '',
            get_nepali_number($mapApply->applicantDetail->localBody?->local_body) ?? '',
            get_nepali_number($mapApply->applicantDetail->ward_no) ?? '',
            get_nepali_number($mapApply->applicantDetail->tole) ?? '',

            //criteria detail

            (string)View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $mapApply->criteriaDetails,
            ]),
            //BuildingDetails

            (string)View::make('emap::inc.building_details', [
                'buildingDetails' => $mapApply->buildingDetails,
            ]),

            //DesignerDetails

            get_nepali_number($designerDetail->name) ?? '',
            get_nepali_number($designerDetail->father_name) ?? '',
            get_nepali_number($designerDetail->phone) ?? '',
            get_nepali_number($designerDetail->address) ?? '',
            get_nepali_number($designerDetail->local_body) ?? '',
            get_nepali_number($designerDetail->ward_no) ?? '',
           get_nepali_number( $designerDetail->nec_council_no) ?? '',
            get_nepali_number($designerDetail->local_body_registration_no) ?? '',
            get_nepali_number($designerDetail->consulting_firm_name) ?? '',
            get_nepali_number($designerDetail->district?->district) ?? '',

            //supervisorDetails

            get_nepali_number($supervisorDetail->name) ?? '',
            get_nepali_number($supervisorDetail->father_name) ?? '',
            get_nepali_number($supervisorDetail->phone) ?? '',
            get_nepali_number($supervisorDetail->address) ?? '',
            get_nepali_number($supervisorDetail->local_body) ?? '',
            get_nepali_number($supervisorDetail->ward_no) ?? '',
            get_nepali_number($supervisorDetail->nec_council_no) ?? '',
            get_nepali_number($supervisorDetail->local_body_registration_no) ?? '',
            get_nepali_number($supervisorDetail->consulting_firm_name) ?? '',
            get_nepali_number($supervisorDetail->district?->district) ?? '',

            //ContractorDetails

            get_nepali_number($contractorDetail->name) ?? '',
            get_nepali_number($contractorDetail->father_name) ?? '',
            get_nepali_number($contractorDetail->phone) ?? '',
            get_nepali_number($contractorDetail->address) ?? '',
            get_nepali_number($contractorDetail->local_body) ?? '',
            get_nepali_number($contractorDetail->ward_no) ?? '',
            get_nepali_number($contractorDetail->nec_council_no) ?? '',
            get_nepali_number($contractorDetail->local_body_registration_no) ?? '',
            get_nepali_number($contractorDetail->consulting_firm_name) ?? '',
            get_nepali_number($contractorDetail->district?->district) ?? '',

        ];
    }

    private function getReplaceData()
    {
        return [
            //header

            '[@header]',
            '[@letter_head]',
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
            '[@landDetail.former_local_body]',
            '[@landDetail.road_name]',


            //landOwner
            // '[@landOwner.land_owner_type]',
            // '[@landOwner.name]',
            // '[@landOwner.phone]',
            // '[@landOwner.father_name]',
            // '[@landOwner.grandfather_name]',
            // '[@landOwner.citizenship_issue_district]',
            // '[@landOwner.citizenship_no]',
            // '[@landOwner.citizenship_issue_date]',
            // '[@landOwner.address]',
            // '[@landOwner.local_body]',
            // '[@landOwner.ward_no]',

            //houseOwner

            // '[@houseOwner.name]',
            // '[@houseOwner.phone]',
            // '[@houseOwner.father_name]',
            // '[@houseOwner.grandfather_name]',
            // '[@houseOwner.citizenship_issue_district]',
            // '[@houseOwner.citizenship_no]',
            // '[@houseOwner.citizenship_issue_date]',
            // '[@houseOwner.address]',
            // '[@houseOwner.local_body]',
            // '[@houseOwner.ward_no]',

            //FourForts

            '[@fourForts]',
            '[@nameOfTheFortsAndSanghiars]',
            '[@landFourFortsDetail]',
            '[@sanghiarsName]',


            //applicantDetail

            '[@applicantDetail.applicant_type]',
            '[@applicantDetail.relation_with_owner]',
            '[@applicantDetail.name]',
            '[@applicantDetail.phone]',
            '[@applicantDetail.father_name]',
            '[@applicantDetail.citizenship_issue_district]',
            '[@applicantDetail.citizenship_no]',
            '[@applicantDetail.citizenship_issue_date]',
            '[@applicantDetail.signature]',
            '[@applicantDetail.province]',
            '[@applicantDetail.district]',
            '[@applicantDetail.local_body]',
            '[@applicantDetail.ward_no]',
            '[@applicantDetail.tole]',

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
            '[@designerDetail.district]',


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
            '[@supervisorDetail.district]',


            //ContractorDetails

            '[@contractorDetail.name]',
            '[@contractorDetail.father_name]',
            '[@contractorDetail.phone]',
            '[@contractorDetail.address]',
            '[@contractorDetail.local_body]',
            '[@contractorDetail.ward_no]',
            '[@contractorDetail.nec_council_no]',
            '[@contractorDetail.local_body_registration_no]',
            '[@contractorDetail.consulting_firm_name]',
            '[@contractorDetail.district]',

        ];
    }
}
