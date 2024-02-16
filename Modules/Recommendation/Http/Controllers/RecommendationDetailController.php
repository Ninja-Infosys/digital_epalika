<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Entities\RecommendationDetail;
use Modules\Recommendation\Entities\RecommendationDocument;
use Modules\Recommendation\Entities\RevenueHeader;
use Modules\Recommendation\Http\Requests\RecommendationDetail\StoreRecommendationDetailRequest;
use Modules\Recommendation\Http\Requests\RecommendationDetail\UpdateRecommendationDetailRequest;

class RecommendationDetailController extends Controller
{
    public function index()
    {
        $recommendationDetails = RecommendationDetail::all();
        return view('recommendation::admin.recommendation.setting.recommendation-detail.index',compact('recommendationDetails'));
    }

    public function create()
    {
        $recommendationCategories = RecommendationCategory::all();
        $revenueHeaders = RevenueHeader::all();
        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.recommendation-detail.create',compact('recommendationDocuments','recommendationCategories','revenueHeaders'));
    }

    public function store(StoreRecommendationDetailRequest $request)
    {
       DB::transaction(function () use ($request){
           $recommendationDetail = RecommendationDetail::create($request->validated());
           $recommendationDetail->revenueHeaders()->attach($request->validated()['revenueHeaders']);
           $recommendationDetail->recommendationDocuments()->attach($request->validated()['recommendationDocuments']);
       });
        toast('सिफारिस विवरण सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationDetail $recommendationDetail)
    {
        return view('recommendation::show');
    }

    public function edit(RecommendationDetail $recommendationDetail)
    {
        $recommendationDetail->load('revenueHeaders','recommendationDocuments');
        $revenueHeaders = RevenueHeader::all();
        $recommendationCategories = RecommendationCategory::all();
        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.recommendation-detail.edit',compact('recommendationDocuments','revenueHeaders','recommendationDetail','recommendationCategories'));
    }

    public function update(UpdateRecommendationDetailRequest $request, RecommendationDetail $recommendationDetail)
    {
        $validatedData = $request->validated();
       DB::transaction(function ()use ($validatedData,$recommendationDetail){
           $keysToCheck = ['is_citizenship_required', 'is_applicable_org', 'is_applicant_self','is_permission_required','is_taxcode_required','add_land_diff_locations','is_applicable_on_recommendation']; // Keys to check for existence
           foreach ($keysToCheck as $key) {
               if (!array_key_exists($key, $validatedData)) {
                   $validatedData[$key] = 0;
               }
           }
           $recommendationDetail->update($validatedData);
           $recommendationDetail->revenueHeaders()->sync($validatedData['revenueHeaders']);
           $recommendationDetail->recommendationDocuments()->sync($validatedData['recommendationDocuments']);
       });
        toast('सिफारिस विवरण सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationDetail.index'));
    }

    public function destroy(RecommendationDetail $recommendationDetail)
    {
        $recommendationDetail->delete();
        toast('सिफारिस विवरण सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus(RecommendationDetail $recommendationDetail)
    {
        $recommendationDetail->update([
            'status' => !$recommendationDetail->status
        ]);

        toast('सिफारिस विवरण स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
