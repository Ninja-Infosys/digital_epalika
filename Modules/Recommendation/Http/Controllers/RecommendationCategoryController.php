<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\RecommendationCategory;
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
            'user_id'=>auth()->id()
        ]);
        toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($type,RecommendationCategory $recommendationCategory)
    {
        return view('recommendation::show');
    }

    public function edit($type,RecommendationCategory $recommendationCategory)
    {
        $recommendationCategories = RecommendationCategory::whereNull('recommendation_category_id')->get();
        return view('recommendation::admin.setting.recommendationcategory.edit', compact('type','recommendationCategory','recommendationCategories'));
    }

    public function update(UpdateRecommendationCategoryRequest $request, $type,RecommendationCategory $recommendationCategory)
    {
        $recommendationCategory->update($request->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect()->route('recommendation::admin.setting.recommendationcategory.index', compact('type','recommendationCategory'));
    }

    public function destroy($type,RecommendationCategory $recommendationCategory)
    {
        $recommendationCategory->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return redirect()->route('recommendation::admin.setting.recommendationcategory.index');
    }
}
