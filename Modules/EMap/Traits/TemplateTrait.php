<?php

namespace Modules\EMap\Traits;

use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\BuildingDocument;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Enums\CheckerDocumentStatusEnum;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;

trait TemplateTrait
{
    protected function getEmapTemplateData($mapApply): array
    {
        $designerDetail = $mapApply->designerDetails->where('post', PostsEnum::DESIGNER)->first();
        $supervisorDetail = $mapApply->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();
        $contractorDetail = $mapApply->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [

            //header
            letterHead(),
            letterHeadEn(),
            officeSetting()->name ?? '',
            officeSetting()->site_address ?? '',
            officeSetting()->province?->province ?? '',
            officeSetting()->district?->district ?? '',
            officeSetting()->localBody?->local_body ?? '',
            officeSetting()->ward_no ?? '',
            get_nepali_number($this->get_today_nepali_date()),

            //mapApply
            get_nepali_number($mapApply?->registration_no ?? ''),
            get_nepali_number($mapApply?->registration_date ?? ''),
            get_nepali_number($mapApply?->construction_type?->label() ?? ''),
            get_nepali_number($mapApply?->usage?->label() ?? ''),
            get_nepali_number($mapApply?->building_category?->label() ?? ''),
            get_nepali_number($mapApply?->structureType->title ?? ''),
            get_nepali_number($mapApply?->current_storey ?? ''),
            get_nepali_number($mapApply?->future_storey ?? ''),
            get_nepali_number($mapApply?->area_of_plinth ?? ''),
            get_nepali_number($mapApply?->length ?? ''),
            get_nepali_number($mapApply?->breadth ?? ''),
            get_nepali_number($mapApply?->height ?? ''),
            get_nepali_number($mapApply?->consultant_name ?? ''),
            get_nepali_number($mapApply?->consultant_mobile_no ?? ''),
            get_nepali_number($mapApply?->consultant_nec_no ?? ''),
            $mapApply->consultant_signature_url ?? '',

            //landDetail
            get_nepali_number($mapApply?->landDetail?->landUseArea?->title ?? ''),
            get_nepali_number($mapApply?->landDetail?->ward_no ?? ''),
            get_nepali_number($mapApply?->landDetail?->former_ward_no ?? ''),
            get_nepali_number($mapApply?->landDetail?->tole ?? ''),
            get_nepali_number($mapApply?->landDetail?->street_code_no ?? ''),
            get_nepali_number($mapApply?->landDetail?->plot_no ?? ''),
            get_nepali_number($mapApply?->landDetail?->unit_value ?? ''),
            get_nepali_number($mapApply?->landDetail?->percentage_of_area_covered_by_building ?? ''),
            get_nepali_number($mapApply?->landDetail?->former_local_body ?? ''),
            get_nepali_number($mapApply?->landDetail?->road_name ?? ''),

            //landowner

            get_nepali_number($mapApply?->landOwner?->land_owner_type?->label() ?? ''),
            get_nepali_number($mapApply?->landOwner?->name ?? ''),
            get_nepali_number($mapApply?->landOwner?->phone ?? ''),
            get_nepali_number($mapApply?->landOwner?->father_name ?? ''),
            get_nepali_number($mapApply?->landOwner?->grandfather_name ?? ''),
            get_nepali_number($mapApply?->landOwner?->citizenshipIssueDistrict?->district ?? ''),
            get_nepali_number($mapApply?->landOwner?->citizenship_no ?? ''),
            get_nepali_number($mapApply?->landOwner?->citizenship_issue_date ?? ''),
            get_nepali_number($mapApply?->landOwner?->province?->province ?? ''),
            get_nepali_number($mapApply?->landOwner?->district?->district ?? ''),
            get_nepali_number($mapApply?->landOwner?->localBody?->local_body ?? ''),
            get_nepali_number($mapApply?->landOwner?->ward_no ?? ''),
            get_nepali_number($mapApply?->landOwner?->tole ?? ''),

            //houseOwner

            get_nepali_number($mapApply?->houseOwner?->name ?? ''),
            get_nepali_number($mapApply?->houseOwner?->phone ?? ''),
            get_nepali_number($mapApply?->houseOwner?->father_name ?? ''),
            get_nepali_number($mapApply?->houseOwner?->grandfather_name ?? ''),
            get_nepali_number($mapApply?->houseOwner?->citizenshipIssueDistrict?->district ?? ''),
            get_nepali_number($mapApply?->houseOwner?->citizenship_no ?? ''),
            get_nepali_number($mapApply?->houseOwner?->citizenship_issue_date ?? ''),
            get_nepali_number($mapApply?->houseOwner?->province?->province ?? ''),
            get_nepali_number($mapApply?->houseOwner?->district?->district ?? ''),
            get_nepali_number($mapApply?->houseOwner?->localBody?->local_body ?? ''),
            get_nepali_number($mapApply?->houseOwner?->ward_no ?? ''),
            get_nepali_number($mapApply?->houseOwner?->tole ?? ''),
            $mapApply?->houseOwner?->photo_url ?? '',

            //FourForts
            (string) View::make('emap::inc.four_forts_table', [
                'fourForts' => $mapApply?->fourForts,
            ]),
            (string) View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $mapApply->fourForts?->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply?->fourForts?->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            (string) View::make('emap::inc.land_four_forts_detail', [
                'actualSetBack' => $mapApply?->fourForts?->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply?->fourForts?->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            (string) View::make('emap::inc.sanghiarsName', [
                'towards' => $mapApply?->fourForts?->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),

            //storeyDetails
            (string) View::make('emap::inc.height_of_each_storey', [
                'storeyDetails' => $mapApply?->storeyDetails,
            ]),
            (string) View::make('emap::inc.area_of_storey', [
                'storeyDetails' => $mapApply?->storeyDetails,

            ]),
            (string) View::make('emap::inc.storey_details', [
                'storeyDetails' => $mapApply?->storeyDetails,

            ]),

            //applicantDetail
            get_nepali_number($mapApply?->applicantDetail?->applicant_type?->label() ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->relation_with_owner?->label() ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->name ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->phone ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->father_name ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->citizenshipIssueDistrict?->district ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->citizenship_no ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->citizenship_issue_date ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->province?->province ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->district?->district ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->localBody?->local_body ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->ward_no ?? ''),
            get_nepali_number($mapApply?->applicantDetail?->tole ?? ''),
            $mapApply?->applicantDetail?->signature_url ?? '',

            //criteria detail

            (string) View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $mapApply?->criteriaDetails,
            ]),
            //BuildingDetails

            (string) View::make('emap::inc.building_details', [
                'buildingDetails' => $mapApply?->buildingDetails,
            ]),

            //DesignerDetails

            get_nepali_number($designerDetail?->name ?? ''),
            get_nepali_number($designerDetail?->phone ?? ''),
            get_nepali_number($designerDetail?->father_name ?? ''),
            get_nepali_number($designerDetail?->province?->province ?? ''),
            get_nepali_number($designerDetail?->localBody?->local_body ?? ''),
            get_nepali_number($designerDetail?->ward_no ?? ''),
            get_nepali_number($designerDetail?->tole ?? ''),
            get_nepali_number($designerDetail?->nec_council_no ?? ''),
            get_nepali_number($designerDetail?->local_body_registration_no ?? ''),
            get_nepali_number($designerDetail?->consulting_firm_name ?? ''),
            get_nepali_number($designerDetail?->district?->district ?? ''),

            //supervisorDetails

            get_nepali_number($supervisorDetail?->name ?? ''),
            get_nepali_number($supervisorDetail?->phone ?? ''),
            get_nepali_number($supervisorDetail?->father_name ?? ''),
            get_nepali_number($supervisorDetail?->province?->province ?? ''),
            get_nepali_number($supervisorDetail?->localBody?->local_body ?? ''),
            get_nepali_number($supervisorDetail?->ward_no ?? ''),
            get_nepali_number($supervisorDetail?->tole ?? ''),
            get_nepali_number($supervisorDetail?->nec_council_no ?? ''),
            get_nepali_number($supervisorDetail?->local_body_registration_no ?? ''),
            get_nepali_number($supervisorDetail?->consulting_firm_name ?? ''),
            get_nepali_number($supervisorDetail?->district?->district ?? ''),

            //ContractorDetails

            get_nepali_number($contractorDetail?->name ?? ''),
            get_nepali_number($contractorDetail?->phone ?? ''),
            get_nepali_number($contractorDetail?->father_name ?? ''),
            get_nepali_number($contractorDetail?->localBody?->local_body ?? ''),
            get_nepali_number($contractorDetail?->province?->province ?? ''),
            get_nepali_number($contractorDetail?->ward_no ?? ''),
            get_nepali_number($contractorDetail?->tole ?? ''),
            get_nepali_number($contractorDetail?->nec_council_no ?? ''),
            get_nepali_number($contractorDetail?->local_body_registration_no ?? ''),
            get_nepali_number($contractorDetail?->consulting_firm_name ?? ''),
            get_nepali_number($contractorDetail?->district?->district ?? ''),


        ];
    }
    protected function getBuildingTemplateData($buildingDocumentation): array
    {

        $buildingContractorDetail = $buildingDocumentation->contractorDetails->first();

        return [

            //Building Documentation

            get_nepali_number($buildingDocumentation?->building_category?->label() ?? ''),
            get_nepali_number($buildingDocumentation?->house_built_year ?? ''),
            get_nepali_number($buildingDocumentation?->room ?? ''),
            get_nepali_number($buildingDocumentation?->current_storey ?? ''),
            get_nepali_number($buildingDocumentation?->plinth_area ?? ''),
            get_nepali_number($buildingDocumentation?->former_local_body ?? ''),
            get_nepali_number($buildingDocumentation?->former_ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->land_ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->plot_no ?? ''),
            get_nepali_number($buildingDocumentation?->land_area ?? ''),
            get_nepali_number($buildingDocumentation?->applicant_name ?? ''),
            get_nepali_number($buildingDocumentation?->local_body ?? ''),
            get_nepali_number($buildingDocumentation?->applicant_ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->applicant_tole ?? ''),
            get_nepali_number($buildingDocumentation?->applicant_phone_no ?? ''),
            get_nepali_number($buildingDocumentation?->consultancy_name ?? ''),
            get_nepali_number($buildingDocumentation?->consultancy_registration_no ?? ''),
            get_nepali_number($buildingDocumentation?->consultant_engineer_name ?? ''),
            get_nepali_number($buildingDocumentation?->n_e_c_registration_no ?? ''),
            get_nepali_number($buildingDocumentation?->consultant_engineer_post ?? ''),

            get_nepali_number($buildingDocumentation?->buildingLandOwner?->name ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->localBody?->local_body ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->former_ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->citizenship_no ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->district?->district ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->buildingLandOwner?->tole ?? ''),

            get_nepali_number($buildingDocumentation?->buildingHouseOwner?->name ?? ''),
            get_nepali_number($buildingDocumentation?->buildingHouseOwner?->district?->district ?? ''),
            get_nepali_number($buildingDocumentation?->buildingHouseOwner?->localBody?->local_body ?? ''),
            get_nepali_number($buildingDocumentation?->buildingHouseOwner?->ward_no ?? ''),
            get_nepali_number($buildingDocumentation?->buildingHouseOwner?->tole ?? ''),
            $buildingDocumentation?->buildingHouseOwner?->photo_url ?? '',

            get_nepali_number($buildingContractorDetail?->name ?? ''),
            get_nepali_number($buildingContractorDetail?->localBody?->local_body ?? ''),
            get_nepali_number($buildingContractorDetail?->ward_no ?? ''),
            get_nepali_number($buildingContractorDetail?->tole ?? ''),
            get_nepali_number($buildingContractorDetail?->phone ?? ''),


            (string) View::make('emap::inc.building_neighbours', [
               'neighbours' => $buildingDocumentation?->neighbours,
            ]),
        ];
    }

    private function getReplaceData(): array
    {
        return [
            //header

            '[@letterHead]',
            '[@letterHeadEn]',
            '[@officeName]',
            '[@officeAddress]',
            '[@officeProvince]',
            '[@officeDistrict]',
            '[@officeLocalBody]',
            '[@officeWardNo]',
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
            '[@consultant_name]',
            '[@consultant_mobile_no]',
            '[@consultant_nec_no]',
            '[@consultant_signature]',

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
            '[@landOwner.land_owner_type]',
            '[@landOwner.name]',
            '[@landOwner.phone]',
            '[@landOwner.father_name]',
            '[@landOwner.grandfather_name]',
            '[@landOwner.citizenship_issue_district]',
            '[@landOwner.citizenship_no]',
            '[@landOwner.citizenship_issue_date]',
            '[@landOwner.province]',
            '[@landOwner.district]',
            '[@landOwner.local_body]',
            '[@landOwner.ward_no]',
            '[@landOwner.tole]',

            //houseOwner

            '[@houseOwner.name]',
            '[@houseOwner.phone]',
            '[@houseOwner.father_name]',
            '[@houseOwner.grandfather_name]',
            '[@houseOwner.citizenship_issue_district]',
            '[@houseOwner.citizenship_no]',
            '[@houseOwner.citizenship_issue_date]',
            '[@houseOwner.province]',
            '[@houseOwner.district]',
            '[@houseOwner.local_body]',
            '[@houseOwner.ward_no]',
            '[@houseOwner.tole]',
            '[@houseOwner.photo]',

            //FourForts

            '[@fourForts]',
            '[@nameOfTheFortsAndSanghiars]',
            '[@landFourFortsDetail]',
            '[@sanghiarsName]',

            //StoreyDetails
            '[@heightOfEachStorey]',
            '[@areaOfEachStorey]',
            '[@storeyDetails]',

            //applicantDetail

            '[@applicantDetail.applicant_type]',
            '[@applicantDetail.relation_with_owner]',
            '[@applicantDetail.name]',
            '[@applicantDetail.phone]',
            '[@applicantDetail.father_name]',
            '[@applicantDetail.citizenship_issue_district]',
            '[@applicantDetail.citizenship_no]',
            '[@applicantDetail.citizenship_issue_date]',
            '[@applicantDetail.province]',
            '[@applicantDetail.district]',
            '[@applicantDetail.local_body]',
            '[@applicantDetail.ward_no]',
            '[@applicantDetail.tole]',
            '[@applicantDetail.signature]',

            //criteria detail
            '[@criteriaDetails]',

            //BuildingDetails
            '[@buildingDetails]',

            //DesignerDetails
            '[@designerDetail.name]',
            '[@designerDetail.phone]',
            '[@designerDetail.father_name]',
            '[@designerDetail.province]',
            '[@designerDetail.local_body]',
            '[@designerDetail.ward_no]',
            '[@designerDetail.tole]',
            '[@designerDetail.nec_council_no]',
            '[@designerDetail.local_body_registration_no]',
            '[@designerDetail.consulting_firm_name]',
            '[@designerDetail.district]',

            //supervisorDetails

            '[@supervisorDetail.name]',
            '[@supervisorDetail.phone]',
            '[@supervisorDetail.father_name]',
            '[@supervisorDetail.province]',
            '[@supervisorDetail.local_body]',
            '[@supervisorDetail.ward_no]',
            '[@supervisorDetail.tole]',
            '[@supervisorDetail.nec_council_no]',
            '[@supervisorDetail.local_body_registration_no]',
            '[@supervisorDetail.consulting_firm_name]',
            '[@supervisorDetail.district]',

            //ContractorDetails

            '[@contractorDetail.name]',
            '[@contractorDetail.father_name]',
            '[@contractorDetail.phone]',
            '[@contractorDetail.province]',
            '[@contractorDetail.local_body]',
            '[@contractorDetail.ward_no]',
            '[@contractorDetail.tole]',
            '[@contractorDetail.nec_council_no]',
            '[@contractorDetail.local_body_registration_no]',
            '[@contractorDetail.consulting_firm_name]',
            '[@contractorDetail.district]',

           

        ];
    }
    private function getBuildingReplaceData(): array
    {
        return [

            //buildingDocumentation

            '[@building_category]',
            '[@house_built_year]',
            '[@room]',
            '[@current_storey]',
            '[@plinth_area]',
            '[@former_local_body]',
            '[@former_ward_no]',
            '[@land_ward_no]',
            '[@plot_no]',
            '[@land_area]',
            '[@applicant_name]',
            '[@local_body]',
            '[@applicant_ward_no]',
            '[@applicant_tole]',
            '[@applicant_phone_no]',
            '[@consultancy_name]',
            '[@consultancy_registration_no]',
            '[@consultant_engineer_name]',
            '[@n_e_c_registration_no]',
            '[@consultant_engineer_post]',

          '[@buildingNeighbours]',
             '[@buildingContractorDetail.local_body]',
             '[@buildingContractorDetail.ward_no]',
             '[@buildingContractorDetail.name]',
             '[@buildingContractorDetail.tole]',
             '[@buildingContractorDetail.phone]',
             '[@buildingHouseOwner.name]',
             '[@buildingHouseOwner.district]',
             '[@buildingHouseOwner.local_body]',
             '[@buildingHouseOwner.ward_no]',
             '[@buildingHouseOwner.tole]',
             '[@buildingHouseOwner.photo]',
             '[@buildingLandOwner.name]',
             '[@buildingLandOwner.local_body]',
             '[@buildingLandOwner.former_ward_no]',
             '[@buildingLandOwner.citizenship_no]',
             '[@buildingLandOwner.ward_no]',
             '[@buildingLandOwner.district]',
             '[@buildingLandOwner.tole]',

        ];
    }

    public function listForms(MapApply $mapApply): array
    {
        $documentTypeModels = collect([AppliedDocument::class, FormStore::class, PaymentStore::class]);

        $documents = collect([]);

        foreach ($documentTypeModels as $documentModel) {
            $typeDocuments = $documentModel::selectRaw('id,status,form_id')->where('map_apply_id', $mapApply->id)->get();
            foreach ($typeDocuments as $document) {
                $documents->push([
                    'document_type' => class_basename($documentModel),
                    'form_id' => $document->form_id,
                    'status' => $document->status?->value,
                ]);
            }
        }

        $order = 0;
        $allApproved = true;
        $forms = Form::withCount('formDataTypes')
            ->orderBy('order')
            ->get()
            ->map(function ($form, $key) use ($documents, &$order, &$allApproved) {
                $status = $documents->where('form_id', $form->id)->pluck('status');

                if (
                    $allApproved && $status->count() >= $form->form_data_types_count
                    && $status->unique()->count() == 1
                    && $status->unique()->filter(fn ($status) => $status == DocumentStatusEnum::APPROVED->value)->isNotEmpty()
                ) {
                    $order = $form->order + 1;
                    $allApproved = true;
                } elseif ($key == 0) {
                    $order = $form->order;
                    $allApproved = false;
                } else {
                    $allApproved = false;
                }
                if ($allApproved) {
                    $mapStatus = DocumentStatusEnum::APPROVED;
                } elseif ($status->contains(DocumentStatusEnum::MODIFY->value)) {
                    $mapStatus = DocumentStatusEnum::MODIFY;
                } elseif ($status->contains(DocumentStatusEnum::PENDING->value)) {
                    $mapStatus = DocumentStatusEnum::PENDING;
                } elseif ($status->contains(DocumentStatusEnum::SENT_TO_CHECKER->value)) {
                    $mapStatus = DocumentStatusEnum::SENT_TO_CHECKER;
                } elseif ($status->contains(DocumentStatusEnum::SENT_TO_APPROVER->value)) {
                    $mapStatus = DocumentStatusEnum::SENT_TO_APPROVER;
                } else {
                    $mapStatus = DocumentStatusEnum::NOT_APPLIED;
                }
                $form->map_status = $mapStatus;

                return $form;
            });

        return [$forms, $order];
    }

    public function buildingDocumentationForms(BuildingDocumentation $buildingDocumentation): array
    {
        $documentTypeModels = collect([BuildingDocument::class]);

        $documents = collect([]);

        foreach ($documentTypeModels as $documentModel) {
            $typeDocuments = $documentModel::selectRaw('id,status,building_documentation_step_id')->where('building_documentation_id', $buildingDocumentation->id)->get();
            foreach ($typeDocuments as $document) {
                $documents->push([
                    'document_type' => class_basename($documentModel),
                    'building_documentation_step_id' => $document->building_documentation_step_id,
                    'status' => $document->status?->value,
                ]);
            }
        }

        $order = 0;
        $allApproved = true;
        $forms = BuildingDocumentationStep::withCount('buildingFormDataTypes')
            ->orderBy('order')
            ->get()
            ->map(function ($form, $key) use ($documents, &$order, &$allApproved) {
                $status = $documents->where('building_documentation_step_id', $form->id)->pluck('status');

                if (
                    $allApproved && $status->count() >= $form->building_form_data_types_count
                    && $status->unique()->count() == 1
                    && $status->unique()->filter(fn ($status) => $status == DocumentStatusEnum::APPROVED->value)->isNotEmpty()
                ) {
                    $order = $form->order + 1;
                    $allApproved = true;
                } elseif ($key == 0) {
                    $order = $form->order;
                    $allApproved = false;
                } else {
                    $allApproved = false;
                }
                if ($allApproved) {
                    $mapStatus = DocumentStatusEnum::APPROVED;
                } elseif ($status->contains(DocumentStatusEnum::MODIFY->value)) {
                    $mapStatus = DocumentStatusEnum::MODIFY;
                } elseif ($status->contains(DocumentStatusEnum::PENDING->value)) {
                    $mapStatus = DocumentStatusEnum::PENDING;
                } elseif ($status->contains(DocumentStatusEnum::SENT_TO_CHECKER->value)) {
                    $mapStatus = DocumentStatusEnum::SENT_TO_CHECKER;
                } elseif ($status->contains(DocumentStatusEnum::SENT_TO_APPROVER->value)) {
                    $mapStatus = DocumentStatusEnum::SENT_TO_APPROVER;
                } else {
                    $mapStatus = DocumentStatusEnum::NOT_APPLIED;
                }
                $form->map_status = $mapStatus;

                return $form;
            });

        return [$forms, $order];
    }
}
