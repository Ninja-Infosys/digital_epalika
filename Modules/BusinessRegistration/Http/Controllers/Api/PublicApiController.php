<?php

namespace Modules\BusinessRegistration\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\BusinessRegistration\Entities\BusinessNature;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Enums\Qualification;

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
}
