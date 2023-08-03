<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Identity\Entities\DisabilityCommittee;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Entities\IdentityMeeting;
use Modules\Identity\Http\Requests\IdentityMeeting\StoreIdentityMeetingRequest;
use Modules\Identity\Http\Requests\IdentityMeeting\UpdateIdentityMeetingRequest;

class IdentityMeetingController extends Controller
{
    public function index()
    {
        $identityMeetings = IdentityMeeting::withCount('disabilityCommittees', 'invitedGuests', 'disabilityIdentityCards')
            ->latest('date_ad')
            ->get();

        return view('identity::admin.identityMeeting.index', compact('identityMeetings'));
    }

    public function create()
    {
        $disabilityCommittees = DisabilityCommittee::orderBy('position')->get();
        $governmentDisabilityTypes = GovernmentalDisabilityType::orderBy('position')->get();
        $disabilityIdentityCards = DisabilityIdentityCard::where('status', StatusEnum::ELIGIBILITY_FOR_MEETING->value)->get();

        return view('identity::admin.identityMeeting.create', compact('disabilityCommittees', 'governmentDisabilityTypes', 'disabilityIdentityCards'));
    }

    public function store(StoreIdentityMeetingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $identityMeeting = IdentityMeeting::create($request->validated());

            $identityMeeting->disabilityCommittees()->attach($request->validated()['committees']);
            $disabilityIds = [];
            foreach ($request->validated()['disabilityIdentityCards'] as $disabilityIdentityCard) {
                if (!empty($disabilityIdentityCard['id'])) {
                    $disabilityIdentityCard = DisabilityIdentityCard::find($disabilityIdentityCard['id']);
                    $disabilityIdentityCard->update([
                        'gov_disability_type_id' => $disabilityIdentityCard['governmental_disability_type_id'],
                        'status' => $disabilityIdentityCard?->is_full_detail_required ? StatusEnum::READY_FOR_PRINT->value : StatusEnum::APPROVE->value
                    ]);
                    $disabilityIds[] = $disabilityIdentityCard['id'];
                }
            }

            $identityMeeting->disabilityIdentityCards()->attach($disabilityIds);

            foreach ($request->validated()["guests"] as $guest) {
                $identityMeeting->invitedGuests()->create($guest);
            }
        });

        toast('बैठक सफलतापुर्बक थपियो', 'success');

        return redirect(route('identity.admin.identityMeeting.index'));
    }


    public function edit(IdentityMeeting $identityMeeting)
    {
        $disabilityCommittees = DisabilityCommittee::orderBy('position')->get();
        $governmentDisabilityTypes = GovernmentalDisabilityType::orderBy('position')->get();

        $identityMeeting->load('disabilityCommittees', 'invitedGuests', 'disabilityIdentityCards');
        return view('identity::admin.identityMeeting.edit', compact('identityMeeting', 'disabilityCommittees', 'governmentDisabilityTypes'));
    }

    public function update(UpdateIdentityMeetingRequest $request, IdentityMeeting $identityMeeting)
    {
        //
    }

    public function destroy(IdentityMeeting $identityMeeting)
    {

        $identityMeeting->delete();
        toast('बैठक सफलतापूर्वक हटाइयो', 'success');

        return redirect(route('identity.admin.identityMeeting.index'));
    }
}
