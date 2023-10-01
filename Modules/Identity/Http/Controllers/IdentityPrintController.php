<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ethnicity;
use App\Models\Occupation;
use App\Models\Settings\Relationship;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Modules\Identity\Entities\DisabilityCommittee;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Entities\IdentityCardUpdate;
use Modules\Identity\Entities\IdentityMeeting;
use Modules\Identity\Enums\CategoryTypeEnum;
use Modules\Identity\Http\Requests\IdentityPrint\UpdateIdentityPrint;
use Modules\Identity\Http\Requests\IdentityPrint\UpdateIdentityPrintRequest;

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
            $disabilityIdentityCard->update([
                'print_count' => $disabilityIdentityCard->print_count + 1
            ]);
            $disabilityIdentityCard->load(
                'governmentalDisabilityType',
                'province',
                'localBody',
                'district',
                'disabilityType',
            );
            return (string)View::make('identity::admin.disabilityPrint.idCard', compact('disabilityIdentityCard'));
        });
        return response()->json([
            'view' => $view,
        ]);
    }

    public function edit(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update', $disabilityIdentityCard);
        $officeSetting = officeSetting();
        $ethnicities = Ethnicity::all();
        $relations = Relationship::all();
        $disabilityTypes = DisabilityType::all();
        $todayDateInBS = $this->get_today_nepali_date();
        $disabilityReasons = DisabilityReason::all();
        $occupations = Occupation::all();
        $identityMeetings = IdentityMeeting::all();
        $disabilityCommittees = DisabilityCommittee::all();
        $governmentDisabilityTypes = GovernmentalDisabilityType::all();
        return view('identity::admin.disabilityPrint.edit', compact('disabilityIdentityCard', 'ethnicities', 'relations', 'disabilityTypes', 'officeSetting', 'disabilityReasons', 'occupations', 'identityMeetings', 'disabilityCommittees', 'governmentDisabilityTypes', 'todayDateInBS'));
    }

    public function update(UpdateIdentityPrintRequest $request, DisabilityIdentityCard $disabilityIdentityCard)
    {
        $this->authorize('update', $disabilityIdentityCard);
        $oldValues = $disabilityIdentityCard->getAttributes();
        $disabilityIdentityCard->update($request->validated());
        $editedValues = $disabilityIdentityCard->getDirty();

         return $oldValues;
        //  return  $editedValues;
        toast('अपाङ्गता परिचय पत्र सफलतापुर्बक अपडेट भयो', 'success');
        return redirect(route('identity.admin.identityPrint'));
    }
}
