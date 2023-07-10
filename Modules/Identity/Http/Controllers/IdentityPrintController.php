<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Enums\CategoryTypeEnum;

class IdentityPrintController extends Controller
{
    public function print()
    {
        $governmentalDisabilityTypes = GovernmentalDisabilityType::with(['disabilityIdentityCards' => function ($query) {
            $query->where('status', StatusEnum::READY_FOR_PRINT->value);
        }])
            ->get()
            ->groupBy(function ($type){
                return $type->category?->label();
            });

//        dd($governmentalDisabilityTypes);
        return view('identity::admin.disabilityPrint.print', compact('governmentalDisabilityTypes'));
    }


}
