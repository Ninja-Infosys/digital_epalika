<?php

namespace Modules\EMap\Http\Requests\MapApplyForm;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMapApplyFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'application_type' => ['required'],
            'construction_type' => ['required'],
            'usage' => ['required'],
            'building_category' => ['required'],
            'structure_type_id' => ['nullable'],
            'current_storey' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'future_storey' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'length' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'breadth' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'height' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'area_of_plinth' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'organization_id' => ['required'],
            'latitude' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'longitude' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'storeyDetails.height' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'storeyDetails.map_fee_id' => ['required'],
            'storeyDetails.area_of_proposed_construction' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'storeyDetails.area_of_former_construction' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'storeyDetails.total_area' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'landDetail.land_use_area' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'landDetail.ward_no' => ['required'],
            'landDetail.former_ward_no' => ['required','string'],
            'landDetail.tole' => ['required'],
            'landDetail.street_code_no' => ['required'],
            'landDetail.plot_no' => ['required'],
            'landDetail.unit_value' => ['required'],
            'landDetail.percentage_of_area_covered_by_building' => ['required', 'regex:/^\d+(\.\d+)?$/'],
            'landOwner.land_owner_type' => ['required'],
            'landOwner.name' => ['required'],
            'landOwner.phone' => ['required'],
            'landOwner.father_name' => ['required'],
            'landOwner.grandfather_name' => ['required'],
            'landOwner.citizenship_no' => ['required'],
            'landOwner.citizenship_issue_district_id' => ['required'],
            'landOwner.address' => ['required'],
            'landOwner.local_body' => ['required'],
            'landOwner.province_id' => ['required'],
            'landOwner.district_id' => ['required'],
            'landOwner.local_body_id' => ['required'],
            'landOwner.ward_no' => ['required'],
            'landOwner.tole' => ['required'],
            'landOwner.photo' => ['required'],
            'houseOwner.name' => ['required'],
            'houseOwner.phone' => ['required'],
            'houseOwner.father_name' => ['required'],
            'houseOwner.grandfather_name' => ['required'],
            'houseOwner.citizenship_no' => ['required'],
            'houseOwner.citizenship_issue_date' => ['required'],
            'houseOwner.citizenship_issue_district_id' => ['required'],
            'houseOwner.address' => ['required'],
            'houseOwner.local_body' => ['required'],
            'houseOwner.province_id' => ['required'],
            'houseOwner.district_id' => ['required'],
            'houseOwner.local_body_id' => ['required'],
            'houseOwner.ward_no' => ['required'],
            'houseOwner.tole' => ['required'],
            'houseOwner.photo' => ['required'],
            'applicantDetail.applicant_type' => ['required'],
            'applicantDetail.relation_with_owner' => ['required'],
            'applicantDetail.name' => ['required'],
            'applicantDetail.phone' => ['required'],
            'applicantDetail.father_name' => ['required'],
            'applicantDetail.citizenship_no' => ['required'],
            'applicantDetail.citizenship_issue_date' => ['required'],
            'applicantDetail.citizenship_issue_district_id' => ['required'],
            'applicantDetail.address' => ['required'],
            'applicantDetail.application_date' => ['required'],
            'applicantDetail.local_body' => ['required'],
            'applicantDetail.ward_no' => ['required'],
            'applicantDetail.signature' => ['nullable'],
        ];

    }
}
