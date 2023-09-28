<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
dd($disabilityIdentityCard);
        $view = DB::transaction(function () use ($disabilityIdentityCard) {
            $disabilityIdentityCard->update([
                'print_count' => $disabilityIdentityCard->print_count + 1
            ]);
            $disabilityIdentityCard->load('governmentalDisabilityType',
                'province',
                'localBody',
                'district',
                'disabilityType',
                'employeeSignature'
            );
            return (string)View::make('identity::admin.disabilityPrint.idCard', compact('disabilityIdentityCard'));
        });
        return response()->json([
            'view' => $view,
        ]);
    }

}
