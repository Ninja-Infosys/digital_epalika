<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RecommendationDocument;
use Modules\Recommendation\Http\Requests\RecommendationDocument\StoreRecommendationDocumentRequest;
use Modules\Recommendation\Http\Requests\RecommendationDocument\UpdateRecommendationDocumentRequest;

class RecommendationDocumentController extends Controller
{
    public function index()
    {
        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.document.index',compact('recommendationDocuments'));
    }

    public function create()
    {
        return view('recommendation::admin.recommendation.setting.document.create');
    }

    public function store(StoreRecommendationDocumentRequest $request)
    {
        RecommendationDocument::create($request->validated());
        toast('कागजात सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationDocument $recommendationDocument)
    {
        return view('recommendation::show');
    }

    public function edit(RecommendationDocument $recommendationDocument)
    {
        return view('recommendation::admin.recommendation.setting.document.edit',compact('recommendationDocument'));
    }

    public function update(UpdateRecommendationDocumentRequest $request, RecommendationDocument $recommendationDocument)
    {
        $recommendationDocument->update($request->validated());
        toast('कागजात सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationDocument.index'));
    }

    public function destroy(RecommendationDocument $recommendationDocument)
    {
        $recommendationDocument->delete();
        toast('कागजात सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
