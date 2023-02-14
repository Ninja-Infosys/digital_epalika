<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\PersonalDetail;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Entities\RegistrationDetail;
use Modules\Recommendation\Http\Requests\Registration\StoreRegistrationRequest;
use Modules\Recommendation\Http\Requests\Registration\UpdateRegistrationRequest;

class RegistrationDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendation_access');
        $registrationDetails = RegistrationDetail::with('recommendationCategory')->get();
        return view('recommendation::admin.registration.index', compact('registrationDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendation_create');
        $recommendationCategories = RecommendationCategory::all();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.registration.create', compact('recommendationCategories','personalDetails'));
    }

    public function store(StoreRegistrationRequest $request)
    {
        $this->checkAuthorization('recommendation_create');
        RegistrationDetail::create($request->validated());
        toast('दर्ता सफलतापूर्वक गरियो','success');
        return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function show(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_access');
        return view('recommendation::admin.registration.show', compact('registrationDetail'));
    }

    public function edit(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_edit');
        $recommendationCategories = RecommendationCategory::all();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.registration.edit', compact('registrationDetail','recommendationCategories','personalDetails'));
    }

    public function update(UpdateRegistrationRequest $request, RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_edit');
        $registrationDetail->update($request->validated());
        toast('सिफारिस विवरण सफलतापूर्वक गरियो','success');
         return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function destroy(RegistrationDetail $registrationDetail)
    {
        $this->checkAuthorization('recommendation_delete');
        $registrationDetail->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो','success');
        return back();
    }


}
