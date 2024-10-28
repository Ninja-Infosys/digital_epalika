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
        $this->checkAuthorization('recommendation_document_access');

        $recommendationDocuments = RecommendationDocument::all();
        return view('recommendation::admin.recommendation.setting.document.index',compact('recommendationDocuments'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendation_document_create');

        return view('recommendation::admin.recommendation.setting.document.create');
    }

    public function store(StoreRecommendationDocumentRequest $request)
    {
        $this->checkAuthorization('recommendation_document_create');

        RecommendationDocument::create($request->validated());
        toast('कागजात सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationDocument $recommendationDocument)
    {
        $this->checkAuthorization('recommendation_document_access');

        return view('recommendation::show');
    }

    public function edit(RecommendationDocument $recommendationDocument)
    {
        $this->checkAuthorization('recommendation_document_edit');

        return view('recommendation::admin.recommendation.setting.document.edit',compact('recommendationDocument'));
    }

    public function update(UpdateRecommendationDocumentRequest $request, RecommendationDocument $recommendationDocument)
    {
        $this->checkAuthorization('recommendation_document_edit');

        $recommendationDocument->update($request->validated());
        toast('कागजात सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationDocument.index'));
    }

    public function destroy(RecommendationDocument $recommendationDocument)
    {
        $this->checkAuthorization('recommendation_document_delete');

        $recommendationDocument->delete();
        toast('कागजात सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
