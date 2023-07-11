<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Enums\CategoryTypeEnum;

class IdentityPrintController extends Controller
{
    public function print()
    {

        $governmentalDisabilityTypes = GovernmentalDisabilityType::with(['disabilityIdentityCards' => function ($query) {
            $query->where('status', StatusEnum::READY_FOR_PRINT->value);
        }])
            ->get();
        return view('identity::admin.disabilityPrint.print', compact('governmentalDisabilityTypes'));
    }

    public function printCard(DisabilityIdentityCard $disabilityIdentityCard)
    {

        $disabilityIdentityCard->load('governmentalDisabilityType',
            'province',
            'localBody',
            'district',
            'disabilityType',
        );
        return view('identity::admin.disabilityPrint.idCard', compact('disabilityIdentityCard'));
        $view = (string)View::make('identity::admin.disabilityPrint.idCard', compact('disabilityIdentityCard'));
        return response()->json([
            'view' => $view,
        ]);
    }

}
