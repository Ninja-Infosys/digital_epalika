<?php

namespace Modules\Identity\Http\Controllers;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityPrint;

class DisabilityPrintController extends Controller
{
    use NepaliDateConverter;

    public function index(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::index');
    }

    public function create(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::create');
    }

    public function store(Request $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255']
        ]);

        DisabilityPrint::create($data + [
                'disability_identity_card_id' => $disabilityIdentityCard->id,
                'date' => $this->get_today_nepali_date(),
                'date_ad' => now()
            ]);
        $disabilityIdentityCard->load('fingerPrints','employeeSignature', 'disabilityType', 'governmentalDisabilityType', 'permanentProvince', 'permanentDistrict', 'permanentLocalBody');
        $view = (string)View::make('identity::admin.disabilityIdentityCard.print', compact('todayDate', 'disabilityIdentityCard', 'officeHeaders'));
        return response()->json([
            'view' => $view,
        ]);

    }

    public function show(DisabilityIdentityCard $disabilityIdentityCard, DisabilityPrint $disabilityPrint)
    {
        return view('identity::show');
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard, DisabilityPrint $disabilityPrint)
    {
        return view('identity::edit');
    }

    public function update(Request $request, DisabilityIdentityCard $disabilityIdentityCard, DisabilityPrint $disabilityPrint)
    {
        //
    }

    public function destroy(DisabilityIdentityCard $disabilityIdentityCard, DisabilityPrint $disabilityPrint)
    {
        //
    }
}
