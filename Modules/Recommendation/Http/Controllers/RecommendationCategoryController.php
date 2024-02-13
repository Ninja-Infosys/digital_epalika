<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Http\Requests\RecommendationCategory\StoreRecommendationCategoryRequest;
use Modules\Recommendation\Http\Requests\RecommendationCategory\UpdateRecommendationCategoryRequest;

class RecommendationCategoryController extends Controller
{

    public function index()
    {
        $this->checkAuthorization('recommendationCategory_access');
        $recommendationCategories = RecommendationCategory::get();
        return view('recommendation::admin.recommendation.setting.recommendation-category.index', compact('recommendationCategories'));
    }

    public function create()
    {
        $this->checkAuthorization('recommendationCategory_create');
        return view('recommendation::admin.recommendation.setting.recommendation-category.create');
    }

    public function store(StoreRecommendationCategoryRequest $request)
    {
        $this->checkAuthorization('recommendationCategory_create');
        RecommendationCategory::create($request->validated() + [
                'user_id' => auth()->id(),
            ]);
        toast('सिफारिश वर्ग सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(RecommendationCategory $recommendationCategory)
    {

    }

    public function edit(RecommendationCategory $recommendationCategory)
    {
        $this->checkAuthorization('recommendationCategory_edit');
        return view('recommendation::admin.recommendation.setting.recommendation-category.edit', compact('recommendationCategory'));
    }

    public function update(UpdateRecommendationCategoryRequest $request, RecommendationCategory $recommendationCategory)
    {
        $this->checkAuthorization('recommendationCategory_edit');
        $recommendationCategory->update($request->validated());
        toast('सिफारिश वर्ग सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.recommendation.setting.recommendationCategory.index'));
    }

    public function destroy(RecommendationCategory $recommendationCategory)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($recommendationCategory->is_active == 1) {
            toast('सक्रिय भएको सिफारिश वर्ग मेटाउन मनाहि छ', 'error');
            return back();
        }
        $recommendationCategory->delete();
        toast('सिफारिश वर्ग सफलतापूर्वक मेटियो', 'success');
        return back();
    }

    public function updateStatus(RecommendationCategory $recommendationCategory)
    {
        $this->checkAuthorization('recommendationCategory_access');
        $recommendationCategory->update([
            'is_active' => !$recommendationCategory->is_active
        ]);

        toast('सिफारिश वर्ग स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
