<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RecommendationSignature;
use Modules\Recommendation\Http\Requests\RecommendationSignature\StoreRecommendationSignatureRequest;
use Modules\Recommendation\Http\Requests\RecommendationSignature\UpdateRecommendationSignatureRequest;

class RecommendationSignatureController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('recommendation_signature_access');
        $recommendationSignatures = RecommendationSignature::all();
        return view('recommendation::admin.recommendation.setting.recommendation-signature.index',compact('recommendationSignatures'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendation_signature_create');
        return view('recommendation::admin.recommendation.setting.recommendation-signature.create');
    }

    public function store(StoreRecommendationSignatureRequest $request)
    {
        $this->checkAuthorization('recommendation_signature_create');

        RecommendationSignature::create($request->validated()+[
            'created_by'=>auth()->id()
            ]);
        toast('हस्ताक्षर सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        $this->checkAuthorization('recommendation_signature_access');

        return view('recommendation::show');
    }

    public function edit(RecommendationSignature $recommendationSignature)
    {
        $this->checkAuthorization('recommendation_signature_edit');
        return view('recommendation::admin.recommendation.setting.recommendation-signature.edit',compact('recommendationSignature'));
    }

    public function update(UpdateRecommendationSignatureRequest $request, RecommendationSignature $recommendationSignature)
    {
        $this->checkAuthorization('recommendation_signature_edit');

        if($request->hasFile('signature') && $recommendationSignature->getRawOriginal('signature'))
        {
            $this->deleteFile($recommendationSignature->getRawOriginal('signature'));
        }
        $recommendationSignature->update($request->validated());
        toast('हस्ताक्षर सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationSignature.index'));
    }

    public function destroy(RecommendationSignature $recommendationSignature)
    {
        $this->checkAuthorization('recommendation_signature_delete');
        $recommendationSignature->delete();
        toast('हस्ताक्षर सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus(RecommendationSignature $recommendationSignature)
    {
        $this->checkAuthorization('recommendation_signature_edit');

        $recommendationSignature->update([
            'status' => !$recommendationSignature->status
        ]);

        toast('हस्ताक्षर स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
