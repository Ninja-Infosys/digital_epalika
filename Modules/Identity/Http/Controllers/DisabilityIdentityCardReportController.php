<?php

namespace Modules\Identity\Http\Controllers;

use App\Enums\Gender;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Entities\GovernmentalDisabilityType;

class DisabilityIdentityCardReportController extends Controller
{
    public function report()
    {
        $governmentalDisabilityTypes = GovernmentalDisabilityType::orderBy('position')->get();
        $disabilityTypes = DisabilityType::with('disabilityIdentityCards')->get()->map(function ($disabilityType) use ($governmentalDisabilityTypes) {
            $cardData = collect();
            //push by types
            foreach ($governmentalDisabilityTypes as $governmentalDisabilityType) {
                $cardData->push([
                    'male' => $disabilityType->disabilityIdentityCards->where('govern_disability_type_id', $governmentalDisabilityType->id)->where('gender', Gender::MALE)->count(),
                    'female' => $disabilityType->disabilityIdentityCards->where('govern_disability_type_id', $governmentalDisabilityType->id)->where('gender', Gender::FEMALE)->count(),
                    'other' => $disabilityType->disabilityIdentityCards->where('govern_disability_type_id', $governmentalDisabilityType->id)->where('gender', Gender::OTHER)->count(),
                    'total' => $disabilityType->disabilityIdentityCards->where('govern_disability_type_id', $governmentalDisabilityType->id)->count()
                ]);
            }
            //push with sum
            $cardData->push([
                'male' => $disabilityType->disabilityIdentityCards->where('gender', Gender::MALE)->count(),
                'female' => $disabilityType->disabilityIdentityCards->where('gender', Gender::FEMALE)->count(),
                'other' => $disabilityType->disabilityIdentityCards->where('gender', Gender::OTHER)->count(),
                'total' => $disabilityType->disabilityIdentityCards->count()
            ]);
            $disabilityType->cardsCount = $cardData;
            return $disabilityType;
        });

        return view('identity::admin.report.disabilityIdentityCardReport', compact('disabilityTypes', 'governmentalDisabilityTypes'));
    }

}
