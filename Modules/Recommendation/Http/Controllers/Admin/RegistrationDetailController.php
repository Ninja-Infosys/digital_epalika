<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        $registrationDetails = RegistrationDetail::all();
        return view('recommendation::admin.registration.index', compact('registrationDetails'));
    }

    public function create()
    {
        $recommendationCategories = RecommendationCategory::get();
        $personaldetails = PersonalDetail::all();
        return view('recommendation::admin.registration.create', compact('recommendationCategories','personaldetails'));
    }

    public function store(StoreRegistrationRequest $request)
    {
        RegistrationDetail::create($request->validated());
       toast('दर्ता सफलतापूर्वक गरियो','success');
       return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function show(RegistrationDetail $registrationDetail)
    {
        return view('recommendation::admin.registration.show', compact('registrationDetail'));
    }

    public function edit(RegistrationDetail $registrationDetail)
    {
        $recommendationCategories = RecommendationCategory::get();
        $personaldetails = PersonalDetail::all();
        return view('recommendation::admin.registration.edit', compact('registrationDetail','recommendationCategories','personaldetails'));
    }

    public function update(UpdateRegistrationRequest $request, RegistrationDetail $registrationDetail)
    {
        $registrationDetail->update($request->validated());
        toast('सिफारिस विवरण सफलतापूर्वक गरियो','success');
         return redirect()->route('admin.recommendation.registrationDetail.index');
    }

    public function destroy(RegistrationDetail $registrationDetail)
    {
        $registrationDetail->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो','success');
        return back();
    }


}
