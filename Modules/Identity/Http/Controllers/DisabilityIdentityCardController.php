<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Ethnicity;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Lottery;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityPrint;
use Modules\Identity\Entities\RecommendationTemplateSetting;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\Relationship;
use Modules\Identity\Http\Requests\DisabilityIdentityCard\StoreDisabilityIdentityCardRequest;
use Modules\Identity\Http\Requests\DisabilityIdentityCard\UpdateDisabilityIdentityCardRequest;

class DisabilityIdentityCardController extends Controller
{
    use NepaliDateConverter;

    public function index()
    {
        $disabilityIdentityCards = DisabilityIdentityCard::with('disabilityType')
            ->where(function ($q) {
                if (!is_null(request('search'))) {
                    $q->whereLike([
                        'name',
                        'name_en',
                        'citizenship_no',
                        'birth_registration_no',
                        'guardian_name',
                        'guardian_name_en',
                        'phone'
                    ], request('search'));
                }
            })
            ->where('status', StatusEnum::PENDING->value)
            ->latest()
            ->paginate(10);

        return view('identity::admin.disabilityIdentityCard.index', compact('disabilityIdentityCards'));
    }

    public function create()
    {
        $officeSetting = officeSetting();
        $ethnicities = Ethnicity::all();
        $relations = Relationship::all();
        $disabilityTypes = DisabilityType::all();
        $todayDateInBS = $this->get_today_nepali_date();
        return view('identity::admin.disabilityIdentityCard.create', compact('officeSetting', 'ethnicities', 'relations', 'disabilityTypes', 'todayDateInBS'));
    }

    public function store(StoreDisabilityIdentityCardRequest $request)
    {
        DisabilityIdentityCard::create($request->validated() + [
                'status' => StatusEnum::PENDING->value
            ]);

        toast('अपाङ्गता परिचय पत्र सफलतापुर्बक दर्ता भयो', 'success');
        return back();
    }

    public function searchCitizenshipNo()
    {
        return view('identity::admin.disabilityIdentityCard.citizenship_search');
    }


    public function show(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('view', $disabilityIdentityCard);
        $officeHeaders = get_office_header();
        $todayDate = $this->get_today_nepali_date();
        $disabilityIdentityCard->load('province', 'district', 'disabilityType', 'localBody', 'relationship');
        return view('identity::admin.disabilityIdentityCard.show', compact('disabilityIdentityCard', 'officeHeaders', 'todayDate'));
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update', $disabilityIdentityCard);
        $ethnicities = Ethnicity::all();
        $relations = Relationship::all();
        $disabilityTypes = DisabilityType::all();
        $todayDateInBS = $this->get_today_nepali_date();
        $officeSetting = officeSetting();
        return view('identity::admin.disabilityIdentityCard.edit', compact('disabilityIdentityCard', 'ethnicities', 'relations', 'disabilityTypes','todayDateInBS','officeSetting'));
    }

    public function update(UpdateDisabilityIdentityCardRequest $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update', $disabilityIdentityCard);
        $disabilityIdentityCard->update($request->validated());
        toast('अपाङ्गता परिचय पत्र सफलतापुर्बक अपडेट भयो', 'success');
        return redirect(route('identity.admin.disabilityIdentityCard.index'));
    }

    public function destroy(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('delete', $disabilityIdentityCard);
        $disabilityIdentityCard->delete();

        return back();
    }

    public function printDetail(DisabilityIdentityCard $disabilityIdentityCard)
    {
//        dd($disabilityIdentityCard->getPlanTemplateData(RecommendationTemplateSetting::first()));
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
