<?php

namespace Modules\Identity\Http\Controllers;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityPrint;
use Modules\Identity\Entities\EmployeeSignature;

class DisabilityPrintController extends Controller
{
    use NepaliDateConverter;
    public function store(Request $request, DisabilityIdentityCard $disabilityIdentityCard, EmployeeSignature $employeeSignature)
    {
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);
        $disabilityPrint =  DB::transaction(function () use ($officeHeaders, $todayDate, $data, $disabilityIdentityCard, $employeeSignature) {
            return DisabilityPrint::create($data + [
                    'disability_identity_card_id' => $disabilityIdentityCard->id,
                    'date' => $this->get_today_nepali_date(),
                    'date_ad' => now(),
                    'employee_signature_id' => $employeeSignature->id
                ]);
        });
        $disabilityIdentityCard->load('disabilityType', 'province', 'district', 'localBody');
        $employeeSignature->load('name', 'designation', 'red_signature');
        $view = (string)View::make('identity::admin.disabilityIdentityCard.print', compact('todayDate', 'disabilityIdentityCard', 'officeHeaders', 'disabilityPrint', 'employeeSignature'));
        return response()->json([
            'view' => $view,
        ]);
    }
}
