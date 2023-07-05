<?php

namespace Modules\Identity\Http\Controllers;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityPrint;

class DisabilityIdentityCardController extends Controller
{
    use NepaliDateConverter;

    public function index()
    {
        $disabilityIdentityCards = DisabilityIdentityCard::with('governmentalDisabilityType')->filterData()->latest()->paginate(10);
        return view('identity::admin.disabilityIdentityCard.index', compact('disabilityIdentityCards'));
    }

    public function create()
    {
        return view('identity::admin.disabilityIdentityCard.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('view', $disabilityIdentityCard);
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        $disabilityIdentityCard->load('fingerPrints', 'employeeSignature', 'disabilityType', 'governmentalDisabilityType', 'permanentProvince', 'permanentDistrict', 'permanentLocalBody');
        return view('identity::admin.disabilityIdentityCard.show', compact('disabilityIdentityCard', 'officeHeaders', 'todayDate'));
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update', $disabilityIdentityCard);
        $disabilityIdentityCard->load('fingerprints');
        return view('identity::admin.disabilityIdentityCard.edit', compact('disabilityIdentityCard'));
    }

    public function update(Request $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        //
    }

    public function destroy(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('delete', $disabilityIdentityCard);
        $disabilityIdentityCard->delete();

        return back();
    }

    public function printDetail(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::admin.disabilityIdentityCard.printDetail', compact('disabilityIdentityCard'));
    }

    public function printAll(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $printData = DisabilityPrint::where('disability_identity_card_id', $disabilityIdentityCard->id)
            ->get()
            ->map(function ($disabilityPrint, $key) {
                $dateTime = new DateTime($disabilityPrint->date_ad);
                $time = $dateTime->format('H:i:s');
                return [
                    'id' => (int)$key + 1,
                    'title' => $disabilityPrint->title,
                    'date' => $disabilityPrint->date,
                    'time' => $time,
                ];
            });
        return response($printData);
    }
}
