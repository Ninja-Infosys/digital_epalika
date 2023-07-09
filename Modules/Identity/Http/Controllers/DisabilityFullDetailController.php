<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Occupation;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityReason;

class DisabilityFullDetailController extends Controller
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
            ->where('status', StatusEnum::APPROVE->value)
            ->latest()
            ->paginate(10);

        return view('identity::admin.disabilityFullDetail.index', compact('disabilityIdentityCards'));
    }


    public function show(DisabilityIdentityCard $disabilityIdentityCard)
    {
        return view('identity::admin.disabilityFullDetail.show', compact('disabilityIdentityCard'));
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $todayDateInBS = $this->get_today_nepali_date();
        $disabilityReasons = DisabilityReason::all();
        $occupations = Occupation::all();
        return view('identity::admin.disabilityFullDetail.edit', compact('disabilityIdentityCard', 'disabilityReasons', 'occupations','todayDateInBS'));
    }

    public function update(Request $request, DisabilityIdentityCard $disabilityIdentityCard)
    {

    }
}
