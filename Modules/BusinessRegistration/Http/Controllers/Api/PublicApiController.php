<?php

namespace Modules\BusinessRegistration\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Enums\Qualification;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistration\StoreBusinessRegistrationFormRequest;
use Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate\StoreBusinessRegistrationTemplateRequest;
use App\Models\Settings\OfficeSetting;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Illuminate\Support\Facades\DB;
use Modules\BusinessRegistration\Entities\Partner;
use Modules\BusinessRegistration\Transformers\BusinessRegistrationResource;

class PublicApiController extends Controller
{
    public function businessRegistrationSetting()
    {
        return [
            'businessNatures' => BusinessNature::selectRaw('id,title')->get(),
            'objectTransactions' => ObjectTransaction::selectRaw('id,title')->get(),
            'qualifications' => Qualification::getValuesWithLabels(),

        ];
    }

    public function businessRegistration(StoreBusinessRegistrationFormRequest $request)
    {
        $data = DB::transaction(function () use ($request) {

            $businessRegistration = BusinessDetail::create($request->validated() + [
                'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                'mobile_user_id' => auth()->id(),
                'submission_no' => time(),
            ]);
            // foreach ($request->validated()['partners'] as $partner) {

            //     $businessRegistration->partners()->create($partner);
            // }

            foreach ($request->validated()['partners'] as $partner) {
                $businessRegistration->partners()->create([
                    'name' => $partner['name'],
                    'name_en' => $partner['name_en'],
                    'citizenship_no' => $partner['citizenship_no'],
                    'issue_date' => $partner['citizenship_no'],
                    'issue_district_id' => $partner['issue_district_id'],
                    'phone' => $partner['phone'],
                    'email' => $partner['email'],
                    'province_id' => $partner['province_id'],
                    'district_id' => $partner['district_id'],
                    'local_body_id' => $partner['local_body_id'],
                    'ward_no' => $partner['ward_no'],
                    'way' => $partner['way'],
                    'tole' => $partner['tole'],
                    'house_no' => $partner['house_no'],
                    'account_no' => $partner['account_no'],
                    'national_card_no' => $partner['national_card_no'],
                    'gender' => $partner['gender'],
                    'education_qualification' => $partner['education_qualification'],
                    'father_name' => $partner['father_name'],
                    'grandfather_name' => $partner['grandfather_name'],
                    // 'photo' => $partner['photo'],
                    // 'signature' => $partner['signature'],
                    // 'citizenship_front' => $partner['citizenship_front'],
                    // 'citizenship_back' => $partner['citizenship_back'],
                    'position' => $partner['position'],
                ]);
            }

            return $businessRegistration;
        });

        return response()->json([
            'message' => 'Business Registered Successfully'
        ], 201);
    }

    public function registeredBusiness()
    {
        return BusinessRegistrationResource::collection(auth()->user()?->load(['businessDetails.objectTransaction', 'businessDetails.businessNature'])?->businessDetails);

    }
}
