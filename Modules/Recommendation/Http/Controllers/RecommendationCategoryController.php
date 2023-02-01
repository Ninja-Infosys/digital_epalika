<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Recommendation\Entities\RecommendationCategory;
use Modules\Recommendation\Entities\RecommendationTemplate;
use Modules\Recommendation\Http\Requests\RecommendationCategory\StoreRecommendationCategoryRequest;
use Modules\Recommendation\Http\Requests\RecommendationCategory\UpdateRecommendationCategoryRequest;

class RecommendationCategoryController extends Controller
{
    public function index($type)
    {
        $recommendationCategories  = RecommendationCategory::with('recommendationCategory')->where(function($query) use($type){
            if($type=='recommendationSubCategory')
            {
                $query->whereNotNull('recommendation_category_id');
            }
            else{
                $query->whereNull('recommendation_category_id');
            }
        })->get();
       
        return view('recommendation::admin.setting.recommendationcategory.index',compact('recommendationCategories', 'type'));
    }

    public function create($type)
    {
        $recommendationCategories = RecommendationCategory::whereNull('recommendation_category_id')->get();
        return view('recommendation::admin.setting.recommendationcategory.create',compact('type','recommendationCategories'));
    }

    public function store(StoreRecommendationCategoryRequest $request,$type)
    {
        
        RecommendationCategory::create($request->validated()+[
            'user_id'=>auth()->id(),
            'is_active' => RecommendationCategory::where('recommendation_category_id', $request->input('recommendation_category_id')
            )->where('is_active', 1)->count() === 0 ? '1' : '0'
        ]);
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($type,RecommendationCategory $recommendationCategory)
    {
        $recommendationCategory->load('recommendationTemplates');
        return view('recommendation::admin.setting.recommendationcategory.show',compact('recommendationCategory','type'));
    }

    public function edit($type,RecommendationCategory $recommendationCategory,)
    {
        $recommendationCategories = RecommendationCategory::whereNull('recommendation_category_id')->get();
        return view('recommendation::admin.setting.recommendationcategory.edit', compact('type','recommendationCategory','recommendationCategories'));
    }

    public function update(UpdateRecommendationCategoryRequest $request, $type,RecommendationCategory $recommendationCategory)
    {
        $recommendationCategory->update($request->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy($type,RecommendationCategory $recommendationCategory)
    {
        if ($recommendationCategory->is_active == 1) {
            toast('Error while deleting file', 'error');

            return back();
        }
        $recommendationCategory->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }
    public function updateStatus($type, RecommendationCategory $recommendationCategory)
    {
    
        $recommendationCategory->update([
            'is_active'=>!$recommendationCategory->is_active
        ]);

        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
