<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Enums\CategoryTypeEnum;

class IdentityPrintController extends Controller
{
    use NepaliDateConverter;

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

        $view = DB::transaction(function () use ($disabilityIdentityCard) {
        $date = $this->get_today_nepali_date();
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
            return (string)View::make('identity::admin.disabilityPrint.idCard', compact('disabilityIdentityCard', 'date'));
        });
        return response()->json([
            'view' => $view,
        ]);
    }

}
