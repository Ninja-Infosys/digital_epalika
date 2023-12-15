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
                    'mobile_user_id' => auth()->id()
                ]);
                foreach($request->validated()['partners'] as $partner){
                    info($partner);
            $businessRegistration->partners()->create($partner);
}

            return $businessRegistration;
        });

        return response()->json([
            'message' => 'Business Registered Successfully'
        ], 201);
    }

    public function registeredBusiness()
    {
        return BusinessRegistrationResource::collection(auth()->user()?->load('mapApplies.houseOwner')?->mapApplies);
    }
}
