<?php

namespace Modules\Identity\Http\Controllers;

use App\Models\OfficeHeader;
use App\Traits\NepaliDateConverter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityIdentityCard;

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
        $this->authorize('view',$disabilityIdentityCard);
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        $disabilityIdentityCard->load('fingerPrints','employeeSignature', 'disabilityType', 'governmentalDisabilityType', 'permanentProvince', 'permanentDistrict', 'permanentLocalBody');
        return view('identity::admin.disabilityIdentityCard.show', compact('disabilityIdentityCard','officeHeaders','todayDate'));
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update',$disabilityIdentityCard);
        $disabilityIdentityCard->load('fingerprints');
        return view('identity::admin.disabilityIdentityCard.edit', compact('disabilityIdentityCard'));
    }

    public function update(Request $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        //
    }

    public function destroy(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('delete',$disabilityIdentityCard);
        $disabilityIdentityCard->delete();

        return back();
    }

    public function print(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        $disabilityIdentityCard->load('fingerPrints','employeeSignature', 'disabilityType', 'governmentalDisabilityType', 'permanentProvince', 'permanentDistrict', 'permanentLocalBody');
        $view = (string)View::make('identity::admin.disabilityIdentityCard.print', compact('todayDate', 'disabilityIdentityCard', 'officeHeaders'));
        return response()->json([
            'view' => $view,
        ]);

    }

}
